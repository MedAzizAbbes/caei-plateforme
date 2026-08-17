<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ClinicPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'city',
        'address',
        'phone',
        'specialty',
        'description',
        'logo',
        'is_active',
        'last_login_at',
    ];

    protected $casts = [
        'is_active'     => 'boolean',
        'last_login_at' => 'datetime',
    ];

    // ─── Relations ────────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicalRequests()
    {
        return $this->hasMany(MedicalRequest::class, 'partner_clinic_id');
    }

    // ─── Helpers ──────────────────────────────────────────────

    public static function generateSlug(string $name): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i    = 1;
        while (static::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }

    public function pendingCount(): int
    {
        return $this->medicalRequests()->where('clinic_status', 'pending_review')->count();
    }

    public function getClinicStatusLabelAttribute(): string
    {
        return match ($this->clinic_status ?? '') {
            'pending_review' => 'En attente de validation',
            'accepted'       => 'Accepté',
            'quoted'         => 'Devis envoyé',
            'rejected'       => 'Refusé',
            default          => 'Inconnu',
        };
    }
}
