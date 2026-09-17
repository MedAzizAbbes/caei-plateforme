<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'rendez_vous_id',
        'partenaire_id',
        'resultat',
        'potentiel',
        'commentaire',
        'qualified_at',
    ];

    protected $casts = [
        'qualified_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saved(function ($qualification) {
            if ($qualification->rendezVous && $qualification->rendezVous->statut !== 'qualifie') {
                $qualification->rendezVous->update(['statut' => 'qualifie']);
            }
        });

        static::deleted(function ($qualification) {
            if ($qualification->rendezVous && $qualification->rendezVous->statut === 'qualifie') {
                $qualification->rendezVous->update(['statut' => 'qualification_en_cours']);
            }
        });
    }

    public function rendezVous()
    {
        return $this->belongsTo(RendezVous::class, 'rendez_vous_id');
    }

    public function partenaire()
    {
        return $this->belongsTo(User::class, 'partenaire_id');
    }

    public function potentielBadgeClasses(): string
    {
        return match ($this->potentiel) {
            'Élevé'  => 'bg-emerald-100 text-emerald-800 border-emerald-300',
            'Moyen'  => 'bg-blue-100 text-blue-800 border-blue-300',
            'Faible' => 'bg-slate-100 text-slate-700 border-slate-300',
            default  => 'bg-slate-100 text-slate-700 border-slate-300',
        };
    }

    public function resultatBadgeClasses(): string
    {
        return match ($this->resultat) {
            'RDV confirmé', 'Prospect qualifié' => 'bg-emerald-100 text-emerald-800 border-emerald-300',
            'RDV signé'                         => 'bg-green-100 text-green-800 border-green-300',
            'RDV annulé', 'Refus', 'Non intéressé' => 'bg-red-100 text-red-800 border-red-300',
            'Rappel programmé', 'À rappeler'    => 'bg-blue-100 text-blue-800 border-blue-300',
            'INJOIGNABLE', 'Non joignable'      => 'bg-amber-100 text-amber-800 border-amber-300',
            'NRP'                               => 'bg-orange-100 text-orange-800 border-orange-300',
            'RDV visité'                        => 'bg-teal-100 text-teal-800 border-teal-300',
            'RDV-R2', 'Prospect intéressé', 'Intéressé' => 'bg-purple-100 text-purple-800 border-purple-300',
            default                             => 'bg-slate-100 text-slate-700 border-slate-300',
        };
    }
}
