<?php

namespace App\Http\Controllers;

use App\Models\EliteTrainingAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EliteAppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'     => 'nullable|string|max:255',
            'name'    => 'nullable|string|max:255',
            'email'   => 'required|email|max:255',
            'mobile'  => 'nullable|string|max:50',
            'phone'   => 'nullable|string|max:50',
            'objet'   => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $fullname = $request->input('nom') ?: $request->input('name');
        if (empty($fullname)) {
            return redirect()->back()->withErrors(['nom' => 'Le nom complet est obligatoire.']);
        }

        $phone = $request->input('mobile') ?: $request->input('phone');
        $subject = $request->input('objet') ?: ($request->input('subject') ?: 'Demande Elite Training');
        $message = $request->input('message') ?: ("Demande d'inscription / devis pour : " . $subject);

        $type = $request->input('type');
        if (!in_array($type, ['appointment', 'inscription'])) {
            $type = 'appointment';
        }

        $appointment = EliteTrainingAppointment::create([
            'fullname' => $fullname,
            'email'    => $validated['email'],
            'phone'    => $phone,
            'subject'  => $subject,
            'message'  => $message,
            'type'     => $type,
            'status'   => 'pending',
        ]);

        try {
            Mail::raw(
                "Nouveau rendez-vous Elite Training CAEI :\n\n" .
                "Nom & Prénom : " . $appointment->fullname . "\n" .
                "Email : " . $appointment->email . "\n" .
                "Téléphone : " . ($appointment->phone ?? 'Non spécifié') . "\n" .
                "Objet : " . ($appointment->subject ?? 'Demande de Rendez-vous') . "\n\n" .
                "Message :\n" . $appointment->message,
                function ($m) use ($appointment) {
                    $m->to('contact@caei-afri.com')
                      ->cc('amenizina12@gmail.com')
                      ->subject('[Elite Training] Nouveau Rendez-vous #' . $appointment->id);
                }
            );
        } catch (\Exception $e) {
            Log::warning("Elite Training notification mail error: " . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Votre demande de rendez-vous a bien été transmise ! Notre équipe vous contactera dans les plus brefs délais.');
    }
}
