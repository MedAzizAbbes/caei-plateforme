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
}
