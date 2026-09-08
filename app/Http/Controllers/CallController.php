<?php

namespace App\Http\Controllers;

use App\Models\CallLog;
use App\Models\Seminar;
use App\Models\User;
use App\Services\LiveKitService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function __construct(private readonly LiveKitService $liveKit)
    {
    }

    /**
     * Initiate a call (caller side).
     * POST /seminaires/{seminar}/appels
     */
    public function initiateCall(Request $request, Seminar $seminar): JsonResponse
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $data = $request->validate([
            'callee_id' => ['required', 'integer', 'exists:users,id'],
            'type'      => ['required', 'in:audio,video'],
        ]);

        $caller = $request->user();
        $callee = User::findOrFail($data['callee_id']);

        // Verify callee is also part of this seminar
        $this->assertUserInSeminar($callee, $seminar);

        // Cannot call yourself
        if ($caller->id === $callee->id) {
            return response()->json(['error' => 'Vous ne pouvez pas vous appeler vous-même.'], 422);
        }

        // Cancel any existing ringing call from this caller in this seminar
        CallLog::where('seminar_id', $seminar->id)
            ->where('caller_id', $caller->id)
            ->where('status', 'ringing')
            ->update(['status' => 'missed']);

        $roomName = $this->liveKit->generateRoomName($seminar->id, $caller->id, $callee->id);

        $call = CallLog::create([
            'seminar_id' => $seminar->id,
            'caller_id'  => $caller->id,
            'callee_id'  => $callee->id,
            'type'       => $data['type'],
            'status'     => 'ringing',
            'room_name'  => $roomName,
        ]);

        $token = $this->liveKit->generateToken($roomName, $caller->id, $caller->fullName(), true);

        return response()->json([
            'call_id'  => $call->id,
            'room'     => $roomName,
            'token'    => $token,
            'ws_url'   => $this->liveKit->getWsUrl(),
            'callee'   => [
                'id'   => $callee->id,
                'name' => $callee->fullName(),
            ],
        ]);
    }

    /**
     * Answer an incoming call (callee side).
     * POST /seminaires/{seminar}/appels/{call}/answer
     */
    public function answerCall(Request $request, Seminar $seminar, CallLog $call): JsonResponse
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $user = $request->user();

        if ($call->callee_id !== $user->id) {
            return response()->json(['error' => 'Non autorisé.'], 403);
        }

        if (!$call->isRinging()) {
            return response()->json(['error' => 'Appel non disponible.'], 409);
        }

        $call->update([
            'status'     => 'accepted',
            'started_at' => now(),
        ]);

        $token = $this->liveKit->generateToken(
            $call->room_name,
            $user->id,
            $user->fullName(),
            true
        );

        return response()->json([
            'call_id' => $call->id,
            'room'    => $call->room_name,
            'token'   => $token,
            'ws_url'  => $this->liveKit->getWsUrl(),
            'caller'  => [
                'id'   => $call->caller_id,
                'name' => $call->caller->fullName(),
            ],
        ]);
    }

    /**
     * Refuse an incoming call.
     * POST /seminaires/{seminar}/appels/{call}/refuse
     */
    public function refuseCall(Request $request, Seminar $seminar, CallLog $call): JsonResponse
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $user = $request->user();

        if ($call->callee_id !== $user->id) {
            return response()->json(['error' => 'Non autorisé.'], 403);
        }

        $call->update(['status' => 'refused']);

        return response()->json(['status' => 'refused']);
    }

    /**
     * End an ongoing call.
     * POST /seminaires/{seminar}/appels/{call}/end
     */
    public function endCall(Request $request, Seminar $seminar, CallLog $call): JsonResponse
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $user = $request->user();

        if ($call->caller_id !== $user->id && $call->callee_id !== $user->id) {
            return response()->json(['error' => 'Non autorisé.'], 403);
        }

        $duration = null;
        if ($call->started_at && in_array($call->status, ['accepted', 'ringing'])) {
            $duration = (int) now()->diffInSeconds($call->started_at);
        }

        $call->update([
            'status'           => 'ended',
            'ended_at'         => now(),
            'duration_seconds' => $duration,
        ]);

        return response()->json([
            'status'   => 'ended',
            'duration' => $call->fresh()->durationFormatted(),
        ]);
    }

    /**
     * Poll for an incoming ringing call directed to the current user.
     * GET /seminaires/{seminar}/appels/incoming
     */
    public function pollIncoming(Request $request, Seminar $seminar): JsonResponse
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $user = $request->user();

        $call = CallLog::with('caller')
            ->where('seminar_id', $seminar->id)
            ->where('callee_id', $user->id)
            ->ringing()
            ->latest()
            ->first();

        if (!$call) {
            return response()->json(['incoming' => false]);
        }

        return response()->json([
            'incoming' => true,
            'call_id'  => $call->id,
            'type'     => $call->type,
            'caller'   => [
                'id'   => $call->caller->id,
                'name' => $call->caller->fullName(),
            ],
        ]);
    }

    /**
     * Check call status (used by caller to detect accept/refuse/end).
     * GET /seminaires/{seminar}/appels/{call}/status
     */
    public function callStatus(Request $request, Seminar $seminar, CallLog $call): JsonResponse
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $user = $request->user();
        if ($call->caller_id !== $user->id && $call->callee_id !== $user->id) {
            return response()->json(['error' => 'Non autorisé.'], 403);
        }

        return response()->json([
            'status' => $call->status,
        ]);
    }

    /**
     * Get call history for a seminar.
     * GET /seminaires/{seminar}/appels/historique
     */
    public function history(Request $request, Seminar $seminar): JsonResponse
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $user  = $request->user();
        $calls = CallLog::with(['caller', 'callee'])
            ->where('seminar_id', $seminar->id)
            ->where(function ($q) use ($user) {
                $q->where('caller_id', $user->id)
                  ->orWhere('callee_id', $user->id);
            })
            ->whereIn('status', ['accepted', 'refused', 'missed', 'ended'])
            ->orderByDesc('created_at')
            ->limit(50)
            ->get()
            ->map(fn ($c) => [
                'id'           => $c->id,
                'type'         => $c->type,
                'status'       => $c->status,
                'duration'     => $c->durationFormatted(),
                'created_at'   => $c->created_at->format('d/m H:i'),
                'is_caller'    => $c->caller_id === $user->id,
                'other_name'   => $c->caller_id === $user->id
                                  ? $c->callee->fullName()
                                  : $c->caller->fullName(),
            ]);

        return response()->json(['calls' => $calls]);
    }

    /**
     * List users in the seminar that can be called.
     * GET /seminaires/{seminar}/appels/membres
     */
    public function members(Request $request, Seminar $seminar): JsonResponse
    {
        $this->authorizeSeminarAccess($request, $seminar);

        $currentUser = $request->user();

        $participants = $seminar->participants()
            ->where('users.id', '!=', $currentUser->id)
            ->get()
            ->map(fn ($u) => [
                'id'   => $u->id,
                'name' => $u->fullName(),
                'role' => 'Participant',
            ]);

        $trainers = $seminar->trainers()
            ->where('users.id', '!=', $currentUser->id)
            ->get()
            ->map(fn ($u) => [
                'id'   => $u->id,
                'name' => $u->fullName(),
                'role' => 'Formateur',
            ]);

        $creatorList = collect();
        if ($seminar->creator && $seminar->creator->id !== $currentUser->id) {
            if (!$trainers->contains('id', $seminar->creator->id) && !$participants->contains('id', $seminar->creator->id)) {
                $roleLabel = $seminar->creator->isFormateur() ? 'Formateur' : 'Organisateur (Admin)';
                $creatorList->push([
                    'id'   => $seminar->creator->id,
                    'name' => $seminar->creator->fullName(),
                    'role' => $roleLabel,
                ]);
            }
        }

        return response()->json([
            'members' => $creatorList->merge($trainers)->merge($participants)->values(),
        ]);
    }

    // ─── Authorization helper (same logic as MessageController) ─────────────

    private function authorizeSeminarAccess(Request $request, Seminar $seminar): void
    {
        $user = $request->user();

        if ($user?->isAdmin()) {
            return;
        }

        if ($seminar->created_by === $user?->id) {
            return;
        }

        $isAssignedTrainer = $user?->isFormateur()
            && $seminar->trainers()->whereKey($user->id)->exists();

        if ($isAssignedTrainer) {
            return;
        }

        $isRegisteredParticipant = $user?->isParticipant()
            && $user->registrations()->where('seminar_id', $seminar->id)->exists();

        abort_unless($isRegisteredParticipant, 403, 'Accès réservé aux participants inscrits et aux formateurs du séminaire.');
    }

    private function assertUserInSeminar(User $user, Seminar $seminar): void
    {
        if ($user->isAdmin()) {
            return;
        }

        if ($seminar->created_by === $user->id) {
            return;
        }

        $isTrainer = $seminar->trainers()->whereKey($user->id)->exists();
        if ($isTrainer) {
            return;
        }

        $isParticipant = $user->registrations()->where('seminar_id', $seminar->id)->exists();

        abort_unless($isParticipant, 422, 'Cet utilisateur ne participe pas à ce séminaire.');
    }
}
