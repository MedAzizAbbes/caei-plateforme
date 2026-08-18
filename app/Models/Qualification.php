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
            'Prospect qualifié'  => 'bg-emerald-100 text-emerald-800 border-emerald-300',
            'Prospect intéressé', 'Intéressé' => 'bg-green-100 text-green-800 border-green-300',
            'À rappeler'         => 'bg-amber-100 text-amber-800 border-amber-300',
            'Non intéressé'      => 'bg-rose-100 text-rose-800 border-rose-300',
            'Non joignable'     => 'bg-purple-100 text-purple-800 border-purple-300',
            'Refus'              => 'bg-red-100 text-red-800 border-red-300',
            default              => 'bg-slate-100 text-slate-700 border-slate-300',
        };
    }
}
