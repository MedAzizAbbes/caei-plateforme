<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'user_id',
        'seminar_id',
        'payment_method',
        'status',
        'arrangement_type',
        'organization_name',
        'contact_person',
        'contact_email',
        'contact_phone',
        'arrangement_document',
        'arrangement_reason',
        'admin_note',
        'attestation_path',
        'invitation_path',
        'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    // ------- Relations -------

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    // ------- Helpers de statut -------

    public function isPaid(): bool
    {
        return $this->status === 'paid';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isArrangementPending(): bool
    {
        return $this->status === 'arrangement_pending';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    public function isUnpaid(): bool
    {
        return $this->status === 'unpaid';
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'paid'                => 'Payé',
            'pending'             => 'En attente',
            'arrangement_pending' => 'Arrangement demandé',
            'rejected'            => 'Refusé',
            default               => 'Non payé',
        };
    }

    public function statusEmoji(): string
    {
        return match ($this->status) {
            'paid'                => '🟢',
            'pending'             => '🟡',
            'arrangement_pending' => '🟠',
            'rejected'            => '❌',
            default               => '🔴',
        };
    }

    public function statusBadgeClasses(): string
    {
        return match ($this->status) {
            'paid'                => 'bg-emerald-100 text-emerald-700 border-emerald-200',
            'pending'             => 'bg-yellow-100 text-yellow-700 border-yellow-200',
            'arrangement_pending' => 'bg-orange-100 text-orange-700 border-orange-200',
            'rejected'            => 'bg-red-100 text-red-700 border-red-200',
            default               => 'bg-slate-100 text-slate-600 border-slate-200',
        };
    }

    public function methodLabel(): string
    {
        return match ($this->payment_method) {
            'bank_transfer' => 'Virement bancaire',
            'visa'          => 'Carte Visa',
            'arrangement'   => 'Arrangement',
            default         => '—',
        };
    }

    public function arrangementTypeLabel(): string
    {
        return match ($this->arrangement_type) {
            'entreprise'    => 'Entreprise',
            'universite'    => 'Université',
            'administration'=> 'Administration',
            'autre'         => 'Autre',
            default         => $this->arrangement_type ?? '—',
        };
    }
}
