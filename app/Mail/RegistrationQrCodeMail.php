<?php

namespace App\Mail;

use App\Models\Registration;
use App\Support\QrCodeSvg;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationQrCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Registration $registration)
    {
        $this->registration->loadMissing('user', 'seminar', 'qrCode');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre QR Code CAEI - ' . ($this->registration->seminar?->theme ?? 'Seminaire')
        );
    }

    public function content(): Content
    {
        $portalUrl = $this->registration->qrCode?->portalUrl();

        return new Content(
            view: 'emails.registration-qr-code',
            with: [
                'registration' => $this->registration,
                'portalUrl' => $portalUrl,
                'qrDataUri' => $portalUrl ? QrCodeSvg::pngDataUri($portalUrl) : null,
            ],
        );
    }

    public function attachments(): array
    {
        $portalUrl = $this->registration->qrCode?->portalUrl();

        if (! $portalUrl) {
            return [];
        }

        return [
            Attachment::fromData(
                fn () => QrCodeSvg::png($portalUrl),
                'qr-code-caei-' . $this->registration->id . '.png'
            )->withMime('image/png'),
        ];
    }
}
