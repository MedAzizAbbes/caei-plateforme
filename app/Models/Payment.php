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
        'amount',
        'currency',
        'bank_name',
        'country',
        'transfer_date',
        'payment_method',
        'transfer_receipt_path',
        'transaction_reference',
        'transaction_id',
        'participant_note',
        'status',
        'reference',
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
        'validated_by',
        'validated_at',
        'rejection_reason',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'transfer_date' => 'date',
        'validated_at' => 'datetime',
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

    public function validatedBy()
    {
        return $this->belongsTo(User::class, 'validated_by');
    }

    // ------- Helpers de statut -------

    public function isPaid(): bool
    {
        return $this->status === 'paid' || $this->status === 'approved';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending' || $this->status === 'arrangement_pending';
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
            'paid', 'approved'    => 'Validé',
            'pending', 'arrangement_pending' => 'En attente',
            'rejected'            => 'Refusé',
            default               => 'Non payé',
        };
    }

    public function statusEmoji(): string
    {
        return match ($this->status) {
            'paid', 'approved'    => '🟢',
            'pending', 'arrangement_pending' => '🟡',
            'rejected'            => '❌',
            default               => '🔴',
        };
    }

    public function statusBadgeClasses(): string
    {
        return match ($this->status) {
            'paid', 'approved'    => 'bg-emerald-100 text-emerald-700 border-emerald-200',
            'pending', 'arrangement_pending' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
            'rejected'            => 'bg-red-100 text-red-700 border-red-200',
            default               => 'bg-slate-100 text-slate-600 border-slate-200',
        };
    }

    public function methodLabel(): string
    {
        return match ($this->payment_method) {
            'bank_transfer' => 'Virement bancaire',
            'card', 'visa'  => 'Carte Visa/Mastercard',
            'arrangement'   => 'Arrangement',
            default         => '—',
        };
    }

    /** Référence unique CAEI pour le virement : CAEI-SEM-{seminar_id}-USER-{user_id} */
    public static function generateReference(int $seminarId, int $userId): string
    {
        return "CAEI-SEM-{$seminarId}-USER-{$userId}";
    }

    /** Alias spec : proof_file → transfer_receipt_path */
    public function getProofFileAttribute(): ?string
    {
        return $this->transfer_receipt_path;
    }

    public function setProofFileAttribute(?string $value): void
    {
        $this->attributes['transfer_receipt_path'] = $value;
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
