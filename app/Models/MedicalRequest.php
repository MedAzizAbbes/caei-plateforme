<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'country',
        'service_type',
        'preferred_date',
        'message',
        'status',
        'admin_notes',
        'partner_clinic',
        'assigned_at',
        'partner_clinic_id',
        'clinic_status',
        'clinic_notes',
        'devis_amount',
        'devis_currency',
        'devis_message',
        'devis_sent_at',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'assigned_at'    => 'datetime',
        'devis_sent_at'  => 'datetime',
        'devis_amount'   => 'decimal:2',
    ];

    // ─── Relations ──────────────────────────────────────────

    public function clinicPartner()
    {
        return $this->belongsTo(ClinicPartner::class, 'partner_clinic_id');
    }

    // ─── Helpers ──────────────────────────────────────────

    public function clinicStatusLabel(): string
    {
        return match ($this->clinic_status) {
            'pending_review' => 'En attente',
            'accepted'       => 'Accepté',
            'quoted'         => 'Devis envoyé',
            'rejected'       => 'Refusé',
            default          => 'Non affecté',
        };
    }
}
