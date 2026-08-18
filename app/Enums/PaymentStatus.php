<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PAID = 'paid';
    case APPROVED = 'approved';
    case PENDING = 'pending';
    case ARRANGEMENT_PENDING = 'arrangement_pending';
    case REJECTED = 'rejected';
    case UNPAID = 'unpaid';

    public function label(): string
    {
        return match ($this) {
            self::PAID, self::APPROVED => 'Validé',
            self::PENDING, self::ARRANGEMENT_PENDING => 'En attente',
            self::REJECTED => 'Refusé',
            self::UNPAID => 'Non payé',
        };
    }
}
