<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'type',
        'domain',
        'duration',
        'price',
        'description',
        'objectives',
        'target_audience',
        'location',
        'image',
        'status',
        'created_by',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Relation avec l'utilisateur créateur (Admin)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scopes pour le filtrage
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCertifiante($query)
    {
        return $query->where('type', 'certifiante');
    }

    public function scopeDiplomante($query)
    {
        return $query->where('type', 'diplomante');
    }

    public function scopeSurMesure($query)
    {
        return $query->where('type', 'sur_mesure');
    }

    public function scopeElearning($query)
    {
        return $query->where('type', 'elearning');
    }

    public function scopeByDomain($query, $domain)
    {
        if (!empty($domain)) {
            return $query->where('domain', $domain);
        }
        return $query;
    }
}
