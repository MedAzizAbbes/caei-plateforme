<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RendezVous extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rendez_vous';

    protected $fillable = [
        'prospect_id',
        'agent_id',
        'partenaire_id',
        'date_rendez_vous',
        'heure_rendez_vous',
        'objet',
        'notes',
        'statut',
        'assigned_at',
    ];

    protected $casts = [
        'date_rendez_vous' => 'date',
        'assigned_at' => 'datetime',
    ];

    public function prospect()
    {
        return $this->belongsTo(Prospect::class, 'prospect_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function partenaire()
    {
        return $this->belongsTo(User::class, 'partenaire_id');
    }

    public function qualification()
    {
        return $this->hasOne(Qualification::class, 'rendez_vous_id');
    }

    public function histories()
    {
        return $this->hasMany(RendezVousHistory::class, 'rendez_vous_id')->latest();
    }

    public function statusLabel(): string
    {
        $statut = ($this->statut !== 'annule' && ($this->relationLoaded('qualification') ? $this->qualification : $this->qualification()->exists())) 
            ? 'qualifie' 
            : $this->statut;

        return match ($statut) {
            'en_attente_affectation'  => 'En attente d\'affectation',
            'affecte'                 => 'Pris en charge',
            'qualification_en_cours'  => 'Qualification en cours',
            'qualifie'                => 'Qualifié',
            'annule'                  => 'Annulé',
            'non_effectue'            => 'Non effectué',
            'reporte'                 => 'Reporté',
            default                   => (string) $statut,
        };
    }

    public function statusBadgeClasses(): string
    {
        $statut = ($this->statut !== 'annule' && ($this->relationLoaded('qualification') ? $this->qualification : $this->qualification()->exists())) 
            ? 'qualifie' 
            : $this->statut;

        return match ($statut) {
            'en_attente_affectation'  => 'bg-amber-100 text-amber-800 border-amber-300',
            'affecte'                 => 'bg-blue-100 text-blue-800 border-blue-300',
            'qualification_en_cours'  => 'bg-indigo-100 text-indigo-800 border-indigo-300',
            'qualifie'                => 'bg-emerald-100 text-emerald-800 border-emerald-300',
            'annule'                  => 'bg-red-100 text-red-800 border-red-300',
            'non_effectue'            => 'bg-slate-100 text-slate-700 border-slate-300',
            'reporte'                 => 'bg-purple-100 text-purple-800 border-purple-300',
            default                   => 'bg-slate-100 text-slate-700',
        };
    }

    public function isQualifie(): bool
    {
        return $this->statut !== 'annule' && (
            $this->statut === 'qualifie' || 
            ($this->relationLoaded('qualification') ? (bool) $this->qualification : $this->qualification()->exists())
        );
    }

    /**
     * Obtenir le résultat effectif de la qualification ou du statut
     */
    public function getQualificationResultat(): ?string
    {
        if ($this->statut === 'annule') {
            return 'RDV annulé';
        }

        $qualif = $this->relationLoaded('qualification') 
            ? $this->qualification 
            : $this->qualification()->first();

        return $qualif?->resultat;
    }

    /**
     * Classes CSS de couleur pour toute la ligne du tableau (<tr>) selon la qualification
     */
    public function qualificationRowClasses(): string
    {
        $res = $this->getQualificationResultat();

        return match ($res) {
            'RDV confirmé', 'Prospect qualifié' => 'bg-emerald-50 hover:bg-emerald-100/70 border-b border-emerald-100',
            'RDV signé'                         => 'bg-green-50 hover:bg-green-100/70 border-b border-green-100',
            'RDV annulé', 'Refus', 'Non intéressé' => 'bg-red-50 hover:bg-red-100/70 border-b border-red-100',
            'Rappel programmé', 'À rappeler'    => 'bg-blue-50 hover:bg-blue-100/70 border-b border-blue-100',
            'INJOIGNABLE', 'Non joignable'      => 'bg-amber-50 hover:bg-amber-100/70 border-b border-amber-100',
            'NRP'                               => 'bg-orange-50 hover:bg-orange-100/70 border-b border-orange-100',
            'RDV visité'                        => 'bg-teal-50 hover:bg-teal-100/70 border-b border-teal-100',
            'RDV-R2', 'Prospect intéressé', 'Intéressé' => 'bg-purple-50 hover:bg-purple-100/70 border-b border-purple-100',
            default                             => 'hover:bg-slate-50 border-b border-slate-100',
        };
    }

    /**
     * Classes CSS pour la bordure gauche colorée de la première cellule (<td>)
     */
    public function qualificationLeftBorderClasses(): string
    {
        $res = $this->getQualificationResultat();

        return match ($res) {
            'RDV confirmé', 'Prospect qualifié' => 'border-l-4 border-emerald-500',
            'RDV signé'                         => 'border-l-4 border-green-600',
            'RDV annulé', 'Refus', 'Non intéressé' => 'border-l-4 border-red-500',
            'Rappel programmé', 'À rappeler'    => 'border-l-4 border-blue-500',
            'INJOIGNABLE', 'Non joignable'      => 'border-l-4 border-amber-400',
            'NRP'                               => 'border-l-4 border-orange-500',
            'RDV visité'                        => 'border-l-4 border-teal-500',
            'RDV-R2', 'Prospect intéressé', 'Intéressé' => 'border-l-4 border-purple-500',
            default                             => 'border-l-4 border-transparent',
        };
    }

    /**
     * Classes CSS pour les cartes de RDV (Mode Fiches Opportunité)
     */
    public function qualificationCardClasses(): string
    {
        $res = $this->getQualificationResultat();

        return match ($res) {
            'RDV confirmé', 'Prospect qualifié' => 'border-emerald-300 ring-1 ring-emerald-200 bg-emerald-50/20 hover:border-emerald-400',
            'RDV signé'                         => 'border-green-400 ring-1 ring-green-200 bg-green-50/20 hover:border-green-500',
            'RDV annulé', 'Refus', 'Non intéressé' => 'border-red-300 ring-1 ring-red-200 bg-red-50/20 hover:border-red-400',
            'Rappel programmé', 'À rappeler'    => 'border-blue-300 ring-1 ring-blue-200 bg-blue-50/20 hover:border-blue-400',
            'INJOIGNABLE', 'Non joignable'      => 'border-amber-300 ring-1 ring-amber-200 bg-amber-50/20 hover:border-amber-400',
            'NRP'                               => 'border-orange-300 ring-1 ring-orange-200 bg-orange-50/20 hover:border-orange-400',
            'RDV visité'                        => 'border-teal-300 ring-1 ring-teal-200 bg-teal-50/20 hover:border-teal-400',
            'RDV-R2', 'Prospect intéressé', 'Intéressé' => 'border-purple-300 ring-1 ring-purple-200 bg-purple-50/20 hover:border-purple-400',
            default                             => 'border-slate-200 hover:border-slate-300 bg-white',
        };
    }
}
