<?php

namespace App\Enums;

enum RendezVousStatus: string
{
    case PENDING_ASSIGNMENT = 'en_attente_affectation';
    case ASSIGNED = 'affecte';
    case QUALIFYING = 'qualification_en_cours';
    case QUALIFIED = 'qualifie';
    case CANCELLED = 'annule';
    case NOT_DONE = 'non_effectue';
    case POSTPONED = 'reporte';

    public function label(): string
    {
        return match ($this) {
            self::PENDING_ASSIGNMENT => 'En attente d\'affectation',
            self::ASSIGNED => 'Affecté',
            self::QUALIFYING => 'Qualification en cours',
            self::QUALIFIED => 'Qualifié',
            self::CANCELLED => 'Annulé',
            self::NOT_DONE => 'Non effectué',
            self::POSTPONED => 'Reporté',
        };
    }
}
