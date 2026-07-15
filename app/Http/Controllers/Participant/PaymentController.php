<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /** Afficher la page "Payer maintenant" avec les 3 options. */
    public function show(Registration $registration)
    {
        $this->authorizeRegistration($registration);

        $registration->load(['seminar', 'payment', 'qrCode']);

        return view('participant.payment.show', compact('registration'));
    }

    /** Soumettre une demande d'arrangement. */
    public function storeArrangement(Request $request, Registration $registration)
    {
        $this->authorizeRegistration($registration);

        // Vérifier qu'il n'y a pas déjà un paiement actif
        if ($registration->payment && in_array($registration->payment->status, ['paid', 'arrangement_pending', 'pending'], true)) {
            return back()->with('error', 'Un paiement est déjà en cours pour ce séminaire.');
        }

        $validated = $request->validate([
            'arrangement_type'     => 'required|in:entreprise,universite,administration,autre',
            'organization_name'    => 'required|string|max:255',
            'contact_person'       => 'required|string|max:255',
            'contact_email'        => 'required|email|max:255',
            'contact_phone'        => 'required|string|max:50',
            'arrangement_reason'   => 'required|string|max:3000',
            'arrangement_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ], [
            'arrangement_type.required'   => 'Veuillez sélectionner un type d\'arrangement.',
            'arrangement_type.in'         => 'Type d\'arrangement invalide.',
            'organization_name.required'  => 'Le nom de l\'organisme est obligatoire.',
            'contact_person.required'     => 'Le nom du responsable est obligatoire.',
            'contact_email.required'      => 'L\'email du responsable est obligatoire.',
            'contact_email.email'         => 'L\'email du responsable est invalide.',
            'contact_phone.required'      => 'Le téléphone est obligatoire.',
            'arrangement_reason.required' => 'Le motif de la demande est obligatoire.',
            'arrangement_document.mimes'  => 'Le document doit être au format PDF, JPG ou PNG.',
            'arrangement_document.max'    => 'Le document ne doit pas dépasser 5 Mo.',
        ]);

        // Stocker le fichier justificatif
        $documentPath = null;
        if ($request->hasFile('arrangement_document')) {
            $documentPath = $request->file('arrangement_document')
                ->store('private/arrangements', 'local');
        }

        // Créer ou mettre à jour le paiement
        $payment = $registration->payment ?? new Payment();
        $payment->fill([
            'registration_id'      => $registration->id,
            'user_id'              => $registration->user_id,
            'seminar_id'           => $registration->seminar_id,
            'payment_method'       => 'arrangement',
            'status'               => 'arrangement_pending',
            'arrangement_type'     => $validated['arrangement_type'],
            'organization_name'    => $validated['organization_name'],
            'contact_person'       => $validated['contact_person'],
            'contact_email'        => $validated['contact_email'],
            'contact_phone'        => $validated['contact_phone'],
            'arrangement_reason'   => $validated['arrangement_reason'],
        ]);

        if ($documentPath) {
            $payment->arrangement_document = $documentPath;
        }

        $payment->save();

        return redirect()
            ->route('participant.dashboard')
            ->with('success', 'Votre demande d\'arrangement a été soumise avec succès. L\'administration vous contactera sous peu.');
    }

    /** Déclarer un virement bancaire effectué. */
    public function storeTransfer(Request $request, Registration $registration)
    {
        $this->authorizeRegistration($registration);

        if ($registration->payment && in_array($registration->payment->status, ['paid', 'arrangement_pending', 'pending'], true)) {
            return back()->with('error', 'Un paiement est déjà en cours pour ce séminaire.');
        }

        $payment = $registration->payment ?? new Payment();
        $payment->fill([
            'registration_id' => $registration->id,
            'user_id'         => $registration->user_id,
            'seminar_id'      => $registration->seminar_id,
            'payment_method'  => 'bank_transfer',
            'status'          => 'pending',
        ]);
        $payment->save();

        return redirect()
            ->route('participant.dashboard')
            ->with('success', 'Votre déclaration de virement a été enregistrée. L\'administration va vérifier la réception du paiement.');
    }

    /** Déclarer un paiement Visa (simulé). */
    public function storeVisa(Request $request, Registration $registration)
    {
        $this->authorizeRegistration($registration);

        if ($registration->payment && in_array($registration->payment->status, ['paid', 'arrangement_pending', 'pending'], true)) {
            return back()->with('error', 'Un paiement est déjà en cours pour ce séminaire.');
        }

        $request->validate([
            'card_name'   => 'required|string|max:100',
            'card_number' => ['required', 'string', 'regex:/^\d{4}\s?\d{4}\s?\d{4}\s?\d{4}$/'],
            'card_expiry' => ['required', 'string', 'regex:/^\d{2}\/\d{2}$/'],
            'card_cvv'    => ['required', 'string', 'regex:/^\d{3,4}$/'],
        ], [
            'card_name.required'   => 'Le nom du titulaire est requis.',
            'card_number.required' => 'Le numéro de carte est requis.',
            'card_number.regex'    => 'Le numéro de carte est invalide (16 chiffres attendus).',
            'card_expiry.regex'    => 'La date d\'expiration est invalide (MM/AA).',
            'card_cvv.regex'       => 'Le CVV est invalide.',
        ]);

        // Simulation — en production, appeler la passerelle ici
        $payment = $registration->payment ?? new Payment();
        $payment->fill([
            'registration_id' => $registration->id,
            'user_id'         => $registration->user_id,
            'seminar_id'      => $registration->seminar_id,
            'payment_method'  => 'visa',
            'status'          => 'pending',
        ]);
        $payment->save();

        return redirect()
            ->route('participant.dashboard')
            ->with('success', 'Votre paiement par carte a été soumis et est en cours de validation.');
    }

    /** Télécharger un document généré (attestation ou invitation). */
    public function downloadDocument(Registration $registration, string $type)
    {
        $this->authorizeRegistration($registration);

        $payment = $registration->payment;

        if (!$payment || !$payment->isPaid()) {
            abort(403, 'Document non disponible.');
        }

        $path = match ($type) {
            'attestation' => $payment->attestation_path,
            'invitation'  => $payment->invitation_path,
            default       => null,
        };

        if (!$path || !Storage::exists($path)) {
            abort(404, 'Document non trouvé.');
        }

        $name = match ($type) {
            'attestation' => 'attestation_paiement_' . $registration->id . '.pdf',
            'invitation'  => 'lettre_invitation_' . $registration->id . '.pdf',
            default       => 'document.pdf',
        };

        return Storage::download($path, $name);
    }

    // ------- Private helpers -------

    private function authorizeRegistration(Registration $registration): void
    {
        abort_unless(
            auth()->id() === $registration->user_id || auth()->user()?->isAdmin(),
            403,
            'Accès non autorisé.'
        );
    }
}
