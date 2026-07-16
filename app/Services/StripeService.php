<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Webhook;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Create a Stripe Checkout Session for a seminar registration.
     */
    public function createCheckoutSession(Registration $registration, Payment $payment): Session
    {
        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [[
                'price_data' => [
                    'currency' => config('services.stripe.currency', 'eur'),
                    'unit_amount' => (int) ($registration->seminar->price * 100), // convert to cents
                    'product_data' => [
                        'name' => 'Inscription au séminaire: ' . $registration->seminar->theme,
                    ],
                ],
                'quantity' => 1,
            ]],
            'customer_email' => $registration->user->email,
            'client_reference_id' => $payment->id,
            'metadata' => [
                'payment_id' => $payment->id,
                'registration_id' => $registration->id,
                'seminar_id' => $registration->seminar_id,
            ],
            'success_url' => route('participant.payment.stripe.success', ['registration' => $registration->id]) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('participant.payment.stripe.cancel', ['registration' => $registration->id]),
        ]);

        $payment->update([
            'stripe_session_id' => $session->id,
        ]);

        Log::info('Stripe Checkout Session created', [
            'payment_id' => $payment->id,
            'session_id' => $session->id,
        ]);

        return $session;
    }

    /**
     * Handle incoming Stripe webhook events.
     */
    public function handleWebhookEvent(string $payload, string $signature): void
    {
        $event = Webhook::constructEvent(
            $payload,
            $signature,
            config('services.stripe.webhook_secret')
        );

        Log::info('Stripe webhook received', ['type' => $event->type]);

        switch ($event->type) {
            case 'checkout.session.completed':
                $this->handleCheckoutCompleted($event->data->object);
                break;
            case 'payment_intent.payment_failed':
                $this->handlePaymentFailed($event->data->object);
                break;
            default:
                Log::info('Unhandled Stripe event type', ['type' => $event->type]);
        }
    }

    /**
     * Handle successful checkout session.
     */
    protected function handleCheckoutCompleted(object $session): void
    {
        $payment = Payment::where('stripe_session_id', $session->id)->first();

        if (!$payment) {
            Log::warning('Stripe webhook checkout.session.completed: Payment not found', ['session_id' => $session->id]);
            return;
        }

        if ($payment->isPaid()) {
            Log::info('Stripe webhook checkout.session.completed: Payment already processed', ['payment_id' => $payment->id]);
            return;
        }

        DB::transaction(function () use ($payment, $session) {
            $payment->update([
                'status' => 'paid',
                'paid_at' => now(),
                'stripe_payment_intent_id' => $session->payment_intent,
                'transaction_id' => $session->payment_intent,
            ]);

            $registration = $payment->registration()->with(['qrCode', 'user', 'seminar'])->first();

            if (! $registration->qrCode) {
                \App\Models\QrCode::generateFor($registration);
                $registration->load('qrCode');
            }

            // Generate PDFs
            $attestationPath = $this->generatePdf('pdf.attestation_paiement', [
                'payment'      => $payment,
                'registration' => $registration,
            ], 'attestation_' . $payment->id . '.pdf');

            $invitationPath = $this->generatePdf('pdf.lettre_invitation', [
                'payment'      => $payment,
                'registration' => $registration,
            ], 'invitation_' . $payment->id . '.pdf');

            $payment->update([
                'attestation_path' => $attestationPath,
                'invitation_path'  => $invitationPath,
            ]);

            $registration->markConfirmed();

            // Send emails
            try {
                \Illuminate\Support\Facades\Mail::to($payment->user->email)
                    ->send(new \App\Mail\ArrangementApprovedMail($payment, $registration, 'attestation'));

                \Illuminate\Support\Facades\Mail::to($payment->user->email)
                    ->send(new \App\Mail\ArrangementApprovedMail($payment, $registration, 'invitation'));

                \Illuminate\Support\Facades\Mail::to($payment->user->email)
                    ->send(new \App\Mail\RegistrationQrCodeMail($registration));
            } catch (\Exception $e) {
                Log::error('Erreur envoi email Stripe paiement: ' . $e->getMessage());
            }
        });

        Log::info('Stripe payment successfully processed', ['payment_id' => $payment->id]);
    }

    private function generatePdf(string $view, array $data, string $filename): ?string
    {
        $pdfFacade = '\Barryvdh\DomPDF\Facade\Pdf';

        if (! class_exists($pdfFacade)) {
            return null;
        }

        $html = view($view, $data)->render();
        $pdf  = $pdfFacade::loadHTML($html)->setPaper('a4', 'portrait');
        $dir  = 'private/generated_docs';
        $path = $dir . '/' . $filename;

        \Illuminate\Support\Facades\Storage::makeDirectory($dir);
        \Illuminate\Support\Facades\Storage::put($path, $pdf->output());

        return $path;
    }

    /**
     * Handle failed payment intent.
     */
    protected function handlePaymentFailed(object $paymentIntent): void
    {
        $payment = Payment::where('stripe_payment_intent_id', $paymentIntent->id)->first();

        // If not found by payment_intent_id, try to find by session if possible (might not have it yet if it failed before session completion)
        // Usually, payment_intent_id is what we have for this event.

        if (!$payment) {
            Log::warning('Stripe webhook payment_intent.payment_failed: Payment not found', ['payment_intent_id' => $paymentIntent->id]);
            return;
        }

        if ($payment->status === 'pending') {
            $payment->update([
                'status' => 'rejected',
                'rejection_reason' => 'Le paiement par carte a échoué via Stripe.',
            ]);

            Log::info('Stripe payment failed and marked as rejected', ['payment_id' => $payment->id]);
        }
    }
}
