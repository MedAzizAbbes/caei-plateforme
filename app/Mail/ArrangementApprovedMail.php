<?php

namespace App\Mail;

use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ArrangementApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Payment      $payment,
        public Registration $registration,
        public string       $type, // 'attestation' or 'invitation'
    ) {}

    public function envelope(): Envelope
    {
        $subject = $this->type === 'attestation'
            ? 'Attestation de paiement — ' . $this->payment->seminar->theme
            : 'Invitation officielle — ' . $this->payment->seminar->theme;

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        $view = $this->type === 'attestation'
            ? 'emails.attestation_paiement'
            : 'emails.invitation_officielle';

        return new Content(
            view: $view,
            with: [
                'payment'      => $this->payment,
                'registration' => $this->registration,
            ]
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        if ($this->type === 'attestation' && $this->payment->attestation_path) {
            $path = Storage::path($this->payment->attestation_path);
            if (file_exists($path)) {
                $attachments[] = Attachment::fromPath($path)
                    ->as('attestation_paiement_' . $this->payment->id . '.pdf')
                    ->withMime('application/pdf');
            }
        }

        if ($this->type === 'invitation' && $this->payment->invitation_path) {
            $path = Storage::path($this->payment->invitation_path);
            if (file_exists($path)) {
                $attachments[] = Attachment::fromPath($path)
                    ->as('lettre_invitation_' . $this->payment->id . '.pdf')
                    ->withMime('application/pdf');
            }
        }

        return $attachments;
    }
}
