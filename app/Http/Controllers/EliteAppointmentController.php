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
            'nom'                => 'nullable|string|max:255',
            'name'               => 'nullable|string|max:255',
            'fullname'           => 'nullable|string|max:255',
            'email'              => 'required|email|max:255',
            'mobile'             => 'nullable|string|max:50',
            'phone'              => 'nullable|string|max:50',
            'country'            => 'nullable|string|max:255',
            'pays'               => 'nullable|string|max:255',
            'job_title'          => 'nullable|string|max:255',
            'fonction'           => 'nullable|string|max:255',
            'poste'              => 'nullable|string|max:255',
            'company'            => 'nullable|string|max:255',
            'entreprise'         => 'nullable|string|max:255',
            'institution'        => 'nullable|string|max:255',
            'organization'       => 'nullable|string|max:255',
            'objet'              => 'nullable|string|max:255',
            'subject'            => 'nullable|string|max:255',
            'formation_title'    => 'nullable|string|max:255',
            'formation'          => 'nullable|string|max:255',
            'session_date'       => 'nullable|string|max:255',
            'date_session'       => 'nullable|string|max:255',
            'participation_mode' => 'nullable|string|max:255',
            'mode_participation' => 'nullable|string|max:255',
            'source'             => 'nullable|string|max:255',
            'comment_connu'      => 'nullable|string|max:255',
            'message'            => 'nullable|string',
        ]);

        $fullname = $request->input('fullname') ?: ($request->input('nom') ?: $request->input('name'));
        if (empty($fullname)) {
            return redirect()->back()->withErrors(['nom' => 'Le nom complet est obligatoire.']);
        }

        $phone = $request->input('phone') ?: $request->input('mobile');
        $country = $request->input('country') ?: $request->input('pays');
        $jobTitle = $request->input('job_title') ?: ($request->input('fonction') ?: $request->input('poste'));
        $company = $request->input('company') ?: ($request->input('entreprise') ?: ($request->input('institution') ?: $request->input('organization')));
        
        $subject = $request->input('formation_title') ?: ($request->input('formation') ?: ($request->input('objet') ?: ($request->input('subject') ?: 'Demande Elite Training')));
        $sessionDate = $request->input('session_date') ?: $request->input('date_session');
        $participationMode = $request->input('participation_mode') ?: $request->input('mode_participation');
        $source = $request->input('source') ?: $request->input('comment_connu');
        $message = $request->input('message') ?: ("Demande d'inscription pour : " . $subject);

        $type = $request->input('type');
        if (!in_array($type, ['appointment', 'inscription'])) {
            $type = 'appointment';
        }

        $appointment = EliteTrainingAppointment::create([
            'fullname'           => $fullname,
            'email'              => $validated['email'],
            'phone'              => $phone,
            'country'            => $country,
            'job_title'          => $jobTitle,
            'company'            => $company,
            'subject'            => $subject,
            'session_date'       => $sessionDate,
            'participation_mode' => $participationMode,
            'source'             => $source,
            'message'            => $message,
            'type'               => $type,
            'status'             => 'pending',
        ]);

        try {
            Mail::raw(
                "Nouvelle demande d'inscription / rendez-vous Elite Training CAEI :\n\n" .
                "Nom & Prénom : " . $appointment->fullname . "\n" .
                "Email : " . $appointment->email . "\n" .
                "Téléphone / WhatsApp : " . ($appointment->phone ?? 'Non spécifié') . "\n" .
                "Pays : " . ($appointment->country ?? 'Non spécifié') . "\n" .
                "Fonction / Poste : " . ($appointment->job_title ?? 'Non spécifié') . "\n" .
                "Entreprise / Institution : " . ($appointment->company ?? 'Non spécifié') . "\n" .
                "Formation choisie : " . ($appointment->subject ?? 'Non spécifiée') . "\n" .
                "Date / Session : " . ($appointment->session_date ?? 'Non spécifiée') . "\n" .
                "Mode de participation : " . ($appointment->participation_mode ?? 'Non spécifié') . "\n" .
                "Connu via : " . ($appointment->source ?? 'Non spécifié') . "\n\n" .
                "Message :\n" . $appointment->message,
                function ($m) use ($appointment) {
                    $m->to('contact@caei-afri.com')
                      ->cc('amenizina12@gmail.com')
                      ->subject('[Elite Training] Inscription #' . $appointment->id . ' - ' . $appointment->fullname);
                }
            );
        } catch (\Exception $e) {
            Log::warning("Elite Training notification mail error: " . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Votre demande d\'inscription a bien été transmise ! Notre équipe vous contactera dans les plus brefs délais.');
    }
}
