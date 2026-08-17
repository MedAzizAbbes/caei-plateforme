<?php

namespace App\Notifications;

use App\Models\RendezVous;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class RendezVousAssignedNotification extends Notification
{
    use Queueable;

    public RendezVous $rendezVous;

    public function __construct(RendezVous $rendezVous)
    {
        $this->rendezVous = $rendezVous;
    }

    /**
     * Canal de notification : uniquement en base de données (Espace Laravel)
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Contenu stocké dans la table notifications
     */
    public function toArray($notifiable): array
    {
        return [
            'rendez_vous_id' => $this->rendezVous->id,
            'prospect_nom'   => $this->rendezVous->prospect ? $this->rendezVous->prospect->nomComplet() : 'Client',
            'date'           => $this->rendezVous->date_rendez_vous ? $this->rendezVous->date_rendez_vous->format('d/m/Y') : '',
            'heure'          => $this->rendezVous->heure_rendez_vous,
            'objet'          => $this->rendezVous->objet,
            'title'          => "🎯 Nouveau RDV Affecté : " . ($this->rendezVous->prospect ? $this->rendezVous->prospect->nomComplet() : 'Client'),
            'message'        => "Un nouveau rendez-vous prospect ('{$this->rendezVous->objet}') vous a été affecté par l'Administrateur.",
            'url'            => route('callcenter.partenaire.qualify', $this->rendezVous),
        ];
    }
}
