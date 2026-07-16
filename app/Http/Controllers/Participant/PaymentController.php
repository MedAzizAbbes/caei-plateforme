<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\BankSetting;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function show(Registration $registration)
    {
        $this->authorizeRegistration($registration);

        $registration->load(['seminar', 'payment', 'qrCode']);
        $bankSetting = BankSetting::first();

        return view('participant.payment.show', compact('registration', 'bankSetting'));
    }

    public function storeArrangement(Request $request, Registration $registration)
    {
        $this->authorizeRegistration($registration);

        if ($this->hasActivePayment($registration)) {
            return back()->with('error', 'Un paiement est deja en cours pour ce seminaire.');
        }

        $validated = $request->validate([
            'arrangement_type' => 'required|in:entreprise,universite,administration,autre',
            'organization_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:50',
            'arrangement_reason' => 'required|string|max:3000',
            'arrangement_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $documentPath = null;
        if ($request->hasFile('arrangement_document')) {
            $documentPath = $request->file('arrangement_document')->store('private/arrangements', 'local');
        }

        DB::transaction(function () use ($registration, $validated, $documentPath, $request) {
            $payment = $registration->payment ?? new Payment();
            $generatedRef = Payment::generateReference($registration->seminar_id, $registration->user_id);

            $payment->fill([
                'registration_id' => $registration->id,
                'user_id' => $registration->user_id,
                'seminar_id' => $registration->seminar_id,
                'amount' => $registration->seminar->price,
                'currency' => 'EUR',
                'country' => $validated['country'],
                'payment_method' => 'arrangement',
                'status' => 'arrangement_pending',
                'reference' => $generatedRef,
                'arrangement_type' => $validated['arrangement_type'],
                'organization_name' => $validated['organization_name'],
                'contact_person' => $validated['contact_person'],
                'contact_email' => $validated['contact_email'],
                'contact_phone' => $validated['contact_phone'],
                'arrangement_reason' => $validated['arrangement_reason'],
                'participant_note' => $request->input('participant_note'),
            ]);

            if ($documentPath) {
                $payment->arrangement_document = $documentPath;
            }

            $payment->save();
        });

        return redirect()
            ->route('participant.dashboard')
            ->with('success', 'Votre demande d\'arrangement a ete soumise avec succes.');
    }

    public function storeTransfer(Request $request, Registration $registration)
    {
        $this->authorizeRegistration($registration);

        if ($this->hasActivePayment($registration)) {
            return back()->with('error', 'Un paiement est deja en cours pour ce seminaire.');
        }

        $request->validate([
            'transfer_receipt' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|string|size:3',
            'transfer_date' => 'required|date|before_or_equal:today',
            'bank_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'transaction_reference' => 'required|string|max:255',
            'participant_note' => 'nullable|string|max:1000',
        ]);

        $receiptPath = $request->file('transfer_receipt')->store('private/transfers', 'local');

        DB::transaction(function () use ($registration, $request, $receiptPath) {
            $payment = $registration->payment ?? new Payment();
            $generatedRef = Payment::generateReference($registration->seminar_id, $registration->user_id);

            $payment->fill([
                'registration_id' => $registration->id,
                'user_id' => $registration->user_id,
                'seminar_id' => $registration->seminar_id,
                'amount' => $request->amount,
                'currency' => $request->currency,
                'bank_name' => $request->bank_name,
                'country' => $request->country,
                'transfer_date' => $request->transfer_date,
                'payment_method' => 'bank_transfer',
                'status' => 'pending',
                'reference' => $generatedRef,
                'transfer_receipt_path' => $receiptPath,
                'transaction_reference' => $request->transaction_reference,
                'participant_note' => $request->participant_note,
            ]);

            $payment->save();
        });

        return redirect()
            ->route('participant.dashboard')
            ->with('success', 'Votre declaration de virement a ete enregistree. L\'administration va verifier la reception du paiement.');
    }

    public function storeOrangeMoney(Request $request, Registration $registration)
    {
        $this->authorizeRegistration($registration);

        if ($this->hasActivePayment($registration)) {
            return back()->with('error', 'Un paiement est deja en cours pour ce seminaire.');
        }

        $request->validate([
            'orange_phone' => 'required|string|max:50',
            'transaction_reference' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|string|size:3',
            'country' => 'required|string|max:255',
            'transfer_receipt' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'participant_note' => 'nullable|string|max:1000',
        ], [
            'orange_phone.required' => 'Le numero Orange Money est obligatoire.',
            'transaction_reference.required' => 'La reference Orange Money est obligatoire.',
            'transfer_receipt.required' => 'Veuillez televerser la preuve Orange Money.',
        ]);

        $receiptPath = $request->file('transfer_receipt')->store('private/orange-money', 'local');

        DB::transaction(function () use ($registration, $request, $receiptPath) {
            $payment = $registration->payment ?? new Payment();
            $generatedRef = Payment::generateReference($registration->seminar_id, $registration->user_id);

            $payment->fill([
                'registration_id' => $registration->id,
                'user_id' => $registration->user_id,
                'seminar_id' => $registration->seminar_id,
                'amount' => $request->amount,
                'currency' => $request->currency,
                'bank_name' => 'Orange Money',
                'country' => $request->country,
                'payment_method' => 'orange_money',
                'status' => 'pending',
                'reference' => $generatedRef,
                'transfer_receipt_path' => $receiptPath,
                'transaction_reference' => $request->transaction_reference,
                'contact_phone' => $request->orange_phone,
                'participant_note' => $request->participant_note,
            ]);

            $payment->save();
        });

        return redirect()
            ->route('participant.dashboard')
            ->with('success', 'Votre paiement Orange Money a ete enregistre. L\'administration va verifier la transaction.');
    }

    public function storeVisa(Request $request, Registration $registration)
    {
        $this->authorizeRegistration($registration);

        return back()->with('error', 'Le paiement par carte Visa/Mastercard n\'est pas disponible pour le moment. Veuillez utiliser le virement bancaire ou Orange Money.');
    }

    public function downloadDocument(Registration $registration, string $type)
    {
        $this->authorizeRegistration($registration);

        $payment = $registration->payment;

        if (! $payment || ! $payment->isPaid()) {
            abort(403, 'Document non disponible.');
        }

        $path = match ($type) {
            'attestation' => $payment->attestation_path,
            'invitation' => $payment->invitation_path,
            default => null,
        };

        if (! $path || ! Storage::exists($path)) {
            abort(404, 'Document non trouve.');
        }

        $name = match ($type) {
            'attestation' => 'attestation_paiement_' . $registration->id . '.pdf',
            'invitation' => 'lettre_invitation_' . $registration->id . '.pdf',
            default => 'document.pdf',
        };

        return Storage::download($path, $name);
    }

    private function authorizeRegistration(Registration $registration): void
    {
        abort_unless(
            auth()->id() === $registration->user_id || auth()->user()?->isAdmin(),
            403,
            'Acces non autorise.'
        );
    }

    private function hasActivePayment(Registration $registration): bool
    {
        return $registration->payment
            && in_array($registration->payment->status, ['paid', 'approved', 'arrangement_pending', 'pending'], true);
    }

}
