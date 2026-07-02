<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class QrCode extends Model
{
    use HasFactory;

    protected $table = 'qr_codes';

    protected $fillable = ['registration_id', 'code', 'secure_token', 'generated_at'];

    protected $casts = [
        'generated_at' => 'datetime',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    /**
     * Génère un code participant lisible (ex: CAEI-2026-0341) et un token
     * sécurisé pour le lien d'accès direct à l'espace participant.
     */
    public static function generateFor(Registration $registration): self
    {
        $year = now()->year;
        $sequence = str_pad((string) $registration->id, 4, '0', STR_PAD_LEFT);

        return self::create([
            'registration_id' => $registration->id,
            'code' => "CAEI-{$year}-{$sequence}",
            'secure_token' => Str::random(40),
            'generated_at' => now(),
        ]);
    }

    public function portalUrl(): string
    {
        return route('portal.show', ['token' => $this->secure_token]);
    }
}
