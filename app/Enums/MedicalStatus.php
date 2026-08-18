<?php

namespace App\Enums;

enum MedicalStatus: string
{
    case PENDING = 'en_attente';
    case PROCESSED = 'traite';
    case ASSIGNED = 'affecte';
    case REJECTED = 'refuse';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'En attente',
            self::PROCESSED => 'Traité',
            self::ASSIGNED => 'Affecté à une clinique',
            self::REJECTED => 'Refusé',
        };
    }
}
