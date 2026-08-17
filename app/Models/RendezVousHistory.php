<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVousHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'rendez_vous_id',
        'user_id',
        'action',
        'description',
    ];

    public function rendezVous()
    {
        return $this->belongsTo(RendezVous::class, 'rendez_vous_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function log(int $rendezVousId, ?int $userId, string $action, string $description): self
    {
        return static::create([
            'rendez_vous_id' => $rendezVousId,
            'user_id'        => $userId,
            'action'         => $action,
            'description'    => $description,
        ]);
    }
}
