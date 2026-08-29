<?php

namespace App\Notifications;

use App\Models\RendezVous;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class RendezVousUpdatedForAgentNotification extends Notification
{
    use Queueable;

    public RendezVous $rendezVous;
    public string $type;
    public string $title;
    public string $message;

    public function __construct(RendezVous $rendezVous, string $type, string $title, string $message)
    {
        $this->rendezVous = $rendezVous;
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Canal de notification : en base de données pour l'espace Agent
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Structure des données enregistrées en base
     */
    public function toArray($notifiable): array
    {
        return [
            'rendez_vous_id' => $this->rendezVous->id,
            'type'           => $this->type,
            'prospect_nom'   => $this->rendezVous->prospect ? $this->rendezVous->prospect->nomComplet() : 'Prospect Client',
            'title'          => $this->title,
            'message'        => $this->message,
            'url'            => route('callcenter.agent.show', $this->rendezVous->id),
        ];
    }
}
