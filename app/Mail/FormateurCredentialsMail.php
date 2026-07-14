<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormateurCredentialsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param  User    $formateur       Le formateur nouvellement créé
     * @param  string  $plainPassword   Le mot de passe en clair (avant hachage)
     */
    public function __construct(
        public User $formateur,
        public string $plainPassword,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Vos identifiants de connexion - Plateforme CAEI',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.formateur-credentials',
            with: [
                'formateur'     => $this->formateur,
                'plainPassword' => $this->plainPassword,
                'loginUrl'      => url('/login'),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
