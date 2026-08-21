<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recrutement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'domaine',
        'message',
        'cv_path',
        'statut',
    ];

    /**
     * Retourne le libellé lisible du statut.
     */
    public function getStatutLabelAttribute(): string
    {
        return match($this->statut) {
            'accepte'    => 'Accepté',
            'refuse'     => 'Refusé',
            default      => 'En attente',
        };
    }

    /**
     * Retourne les classes Tailwind de la badge selon le statut.
     */
    public function getStatutBadgeClassAttribute(): string
    {
        return match($this->statut) {
            'accepte'  => 'bg-emerald-100 text-emerald-800 border-emerald-200',
            'refuse'   => 'bg-rose-100 text-rose-800 border-rose-200',
            default    => 'bg-amber-100 text-amber-800 border-amber-200',
        };
    }
}
