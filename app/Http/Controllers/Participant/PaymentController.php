<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /** Afficher la page "Payer maintenant" avec les options. */
    public function show(Registration $registration)
    {
        $this->authorizeRegistration($registration);

        $registration->load(['seminar', 'payment', 'qrCode']);
        $bankSetting = \App\Models\BankSetting::first();

        return view('participant.payment.show', compact('registration', 'bankSetting'));
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
            'country'              => 'required|string|max:255',
            'contact_person'       => 'required|string|max:255',
            'contact_email'        => 'required|email|max:255',
            'contact_phone'        => 'required|string|max:50',
            'arrangement_reason'   => 'required|string|max:3000',
            'arrangement_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ], [
            'arrangement_type.required'   => 'Veuillez sélectionner un type d\'arrangement.',
            'arrangement_type.in'         => 'Type d\'arrangement invalide.',
            'organization_name.required'  => 'Le nom de l\'organisme est obligatoire.',
            'country.required'            => 'Le pays de l\'organisme est obligatoire.',
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

        // Créer ou mettre à jour le paiement dans une transaction
        DB::transaction(function () use ($registration, $validated, $documentPath) {
            $payment = $registration->payment ?? new Payment();
            $year = $registration->created_at->format('Y');
            $refId = str_pad($registration->id, 6, '0', STR_PAD_LEFT);
            $generatedRef = "CAEI-{$year}-{$registration->seminar_id}-{$registration->user_id}-{$refId}";

            $payment->fill([
                'registration_id'      => $registration->id,
                'user_id'              => $registration->user_id,
                'seminar_id'           => $registration->seminar_id,
                'amount'               => $registration->seminar->price,
                'currency'             => 'EUR',
                'country'              => $validated['country'],
                'payment_method'       => 'arrangement',
                'status'               => 'arrangement_pending',
                'arrangement_type'     => $validated['arrangement_type'],
                'organization_name'    => $validated['organization_name'],
                'contact_person'       => $validated['contact_person'],
                'contact_email'        => $validated['contact_email'],
                'contact_phone'        => $validated['contact_phone'],
                'arrangement_reason'   => $validated['arrangement_reason'],
                'participant_note'     => "Ref Interne: {$generatedRef}",
            ]);

            if ($documentPath) {
                $payment->arrangement_document = $documentPath;
            }

            $payment->save();
        });

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

        $request->validate([
            'transfer_receipt'      => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'amount'                => 'required|numeric|min:1',
            'currency'              => 'required|string|size:3',
            'transfer_date'         => 'required|date|before_or_equal:today',
            'bank_name'             => 'required|string|max:255',
            'country'               => 'required|string|max:255',
            'transaction_reference' => 'required|string|max:255',
            'participant_note'      => 'nullable|string|max:1000',
        ], [
            'transfer_receipt.required' => 'Veuillez téléverser la preuve de virement.',
            'transfer_receipt.mimes'    => 'Le document doit être au format PDF, JPG ou PNG.',
            'transfer_receipt.max'      => 'Le document ne doit pas dépasser 5 Mo.',
            'amount.required'           => 'Le montant est obligatoire.',
            'currency.required'         => 'La devise est obligatoire.',
            'transfer_date.required'    => 'La date du virement est obligatoire.',
            'bank_name.required'        => 'Le nom de votre banque est obligatoire.',
            'country.required'          => 'Le pays de votre banque est obligatoire.',
            'transaction_reference.required' => 'La référence de la transaction est obligatoire.',
        ]);

        $receiptPath = $request->file('transfer_receipt')->store('private/transfers', 'local');

        DB::transaction(function () use ($registration, $request, $receiptPath) {
            $payment = $registration->payment ?? new Payment();
            
            // Format reference: CAEI-{ANNEE}-{SEMINAIRE}-{USER}-{REG_ID}
            $year = $registration->created_at->format('Y');
            $refId = str_pad($registration->id, 6, '0', STR_PAD_LEFT);
            $generatedRef = "CAEI-{$year}-{$registration->seminar_id}-{$registration->user_id}-{$refId}";

            $payment->fill([
                'registration_id'       => $registration->id,
                'user_id'               => $registration->user_id,
                'seminar_id'            => $registration->seminar_id,
                'amount'                => $request->amount,
                'currency'              => $request->currency,
                'bank_name'             => $request->bank_name,
                'country'               => $request->country,
                'transfer_date'         => $request->transfer_date,
                'payment_method'        => 'bank_transfer',
                'status'                => 'pending',
                'transfer_receipt_path' => $receiptPath,
                'transaction_reference' => $request->transaction_reference, // participant input
                'participant_note'      => "Ref Interne: {$generatedRef}\n" . $request->participant_note,
            ]);
            $payment->save();
        });

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
            'country'     => 'required|string|max:255',
            'card_name'   => 'required|string|max:100',
            'card_number' => ['required', 'string', 'regex:/^\d{4}\s?\d{4}\s?\d{4}\s?\d{4}$/'],
            'card_expiry' => ['required', 'string', 'regex:/^\d{2}\/\d{2}$/'],
            'card_cvv'    => ['required', 'string', 'regex:/^\d{3,4}$/'],
        ], [
            'country.required'     => 'Le pays de résidence est obligatoire.',
            'card_name.required'   => 'Le nom du titulaire est requis.',
            'card_number.required' => 'Le numéro de carte est requis.',
            'card_number.regex'    => 'Le numéro de carte est invalide (16 chiffres attendus).',
            'card_expiry.regex'    => 'La date d\'expiration est invalide (MM/AA).',
            'card_cvv.regex'       => 'Le CVV est invalide.',
        ]);

        // Simulation — pas de stockage des numéros de carte en BDD
        DB::transaction(function () use ($registration, $request) {
            $payment = $registration->payment ?? new Payment();
            $payment->fill([
                'registration_id' => $registration->id,
                'user_id'         => $registration->user_id,
                'seminar_id'      => $registration->seminar_id,
                'amount'          => $registration->seminar->price,
                'currency'        => 'EUR',
                'country'         => $request->country,
                'payment_method'  => 'visa',
                'status'          => 'pending',
            ]);
            $payment->save();
        });

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
