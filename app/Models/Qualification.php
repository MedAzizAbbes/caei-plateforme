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
            'RDV confirmé', 'Prospect qualifié' => 'bg-emerald-200/90 text-emerald-950 font-bold',
            'RDV signé'                         => 'bg-green-200/90 text-green-950 font-bold',
            'RDV annulé', 'Refus', 'Non intéressé' => 'bg-red-200/90 text-red-950 font-bold',
            'Rappel programmé', 'À rappeler'    => 'bg-blue-200/90 text-blue-950 font-bold',
            'INJOIGNABLE', 'Non joignable'      => 'bg-amber-200/90 text-amber-950 font-bold',
            'NRP'                               => 'bg-orange-200/90 text-orange-950 font-bold',
            'RDV visité'                        => 'bg-teal-200/90 text-teal-950 font-bold',
            'RDV-R2', 'Prospect intéressé', 'Intéressé' => 'bg-purple-200/90 text-purple-950 font-bold',
            default                             => 'bg-slate-200 text-slate-800 font-bold',
        };
    }
}
