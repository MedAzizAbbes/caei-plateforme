<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicNotificationController extends Controller
{
    /**
     * Retourne les notifications récentes au format JSON
     */
    public function index(): JsonResponse
    {
        $user = Auth::user();

        if (! $user) {
            return response()->json(['notifications' => [], 'unread_count' => 0]);
        }

        $notifications = $user->notifications()
            ->latest()
            ->take(15)
            ->get()
            ->map(function ($notif) {
                return [
                    'id'         => $notif->id,
                    'read'       => $notif->read(),
                    'data'       => $notif->data,
                    'created_at' => $notif->created_at->diffForHumans(),
                    'date'       => $notif->created_at->format('d/m/Y H:i'),
                ];
            });

        return response()->json([
            'notifications' => $notifications,
            'unread_count'  => $user->unreadNotifications()->count(),
        ]);
    }

    /**
     * Marquer une notification comme lue et rediriger vers le dossier patient
     */
    public function markAsRead(Request $request, string $id)
    {
        $user = Auth::user();
        $notif = $user->notifications()->find($id);

        if ($notif) {
            $notif->markAsRead();
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        $url = $notif?->data['url'] ?? route('clinic.patients.index');
        return redirect($url);
    }

    /**
     * Marquer toutes les notifications comme lues
     */
    public function markAllAsRead(Request $request)
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
    }
}
