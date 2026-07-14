<?php

namespace App\Http\Controllers\Formateur;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use App\Models\Attendance;
use App\Models\Registration;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SeminarAttendanceExport;

class AttendanceController extends Controller
{
    public function index($seminarId)
    {
        $seminar = Seminar::with(['registrations.user', 'attendances'])->findOrFail($seminarId);
        
        // Ensure the logged-in trainer is assigned to this seminar
        if (!auth()->user()->isAdmin() && !$seminar->trainers()->where('user_id', auth()->id())->exists()) {
            abort(403, 'Accès non autorisé à ce séminaire.');
        }

        $totalDays = $seminar->start_date ? $seminar->start_date->diffInDays($seminar->end_date) + 1 : 1;

        return view('formateur.presences.index', compact('seminar', 'totalDays'));
    }

    public function scan($seminarId, Request $request)
    {
        $seminar = Seminar::findOrFail($seminarId);
        
        if (!auth()->user()->isAdmin() && !$seminar->trainers()->where('user_id', auth()->id())->exists()) {
            abort(403);
        }

        $dayNumber = $request->query('day_number', 1);
        $totalDays = $seminar->start_date ? $seminar->start_date->diffInDays($seminar->end_date) + 1 : 1;

        return view('formateur.presences.scan', compact('seminar', 'dayNumber', 'totalDays'));
    }

    public function storeScan($seminarId, Request $request)
    {
        $seminar = Seminar::findOrFail($seminarId);
        
        if (!auth()->user()->isAdmin() && !$seminar->trainers()->where('user_id', auth()->id())->exists()) {
            return response()->json(['status' => 'error', 'message' => 'Non autorisé'], 403);
        }

        $data = $request->validate([
            'code' => ['required', 'string'],
            'day_number' => ['required', 'integer', 'min:1'],
        ]);

        $value = trim($data['code']);
        $dayNumber = $data['day_number'];
        $token = null;

        if (Str::contains($value, '/p/')) {
            $token = Str::afterLast($value, '/p/');
            $token = Str::before($token, '?');
            $token = Str::before($token, '#');
        }

        $qrCode = QrCode::where('code', $value)
            ->orWhere('secure_token', $value)
            ->when($token, fn ($query) => $query->orWhere('secure_token', $token))
            ->first();

        if (! $qrCode) {
            return response()->json([
                'status' => 'error',
                'message' => 'Code QR introuvable.',
            ], 404);
        }

        $registration = $qrCode->registration;

        if ($registration->seminar_id != $seminar->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ce participant n\'est pas inscrit à ce séminaire.',
            ], 400);
        }

        $alreadyScanned = Attendance::where('registration_id', $registration->id)
            ->where('seminar_id', $seminar->id)
            ->where('day_number', $dayNumber)
            ->exists();

        if ($alreadyScanned) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Présence déjà enregistrée aujourd\'hui (Jour ' . $dayNumber . ').',
            ], 200);
        }

        $attendance = Attendance::create([
            'registration_id' => $registration->id,
            'seminar_id'      => $seminar->id,
            'day_number'      => $dayNumber,
            'scanned_by'      => $request->user()->id,
            'method'          => 'qr',
            'scanned_at'      => now(),
        ]);

        $registration->update(['status' => 'present']);

        return response()->json([
            'status'      => 'ok',
            'participant' => $registration->user->fullName(),
            'message'     => 'Présence enregistrée avec succès (Jour ' . $dayNumber . ').',
        ]);
    }

    public function exportPdf($seminarId)
    {
        $seminar = Seminar::with(['registrations.user', 'attendances', 'trainers'])->findOrFail($seminarId);
        
        if (!auth()->user()->isAdmin() && !$seminar->trainers()->where('user_id', auth()->id())->exists()) {
            abort(403);
        }

        $totalDays = $seminar->start_date ? $seminar->start_date->diffInDays($seminar->end_date) + 1 : 1;

        $pdf = Pdf::loadView('formateur.presences.pdf', compact('seminar', 'totalDays'));
        return $pdf->download('fiche_presence_' . Str::slug($seminar->theme) . '.pdf');
    }

    public function exportExcel($seminarId)
    {
        $seminar = Seminar::findOrFail($seminarId);
        
        if (!auth()->user()->isAdmin() && !$seminar->trainers()->where('user_id', auth()->id())->exists()) {
            abort(403);
        }

        return Excel::download(new SeminarAttendanceExport($seminarId), 'fiche_presence_' . Str::slug($seminar->theme) . '.xlsx');
    }
}
