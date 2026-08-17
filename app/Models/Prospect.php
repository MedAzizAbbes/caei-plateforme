<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'nom',
        'prenom',
        'email',
        'telephone',
        'societe',
        'secteur',
        'adresse',
        'notes',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }

    public function nomComplet(): string
    {
        return trim("{$this->nom} {$this->prenom}");
    }
}
