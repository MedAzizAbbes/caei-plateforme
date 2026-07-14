<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme', 'country', 'description', 'start_date', 'end_date', 'status', 'created_by', 'hours',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function trainers()
    {
        return $this->belongsToMany(User::class, 'seminar_trainer');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    /** Participants inscrits (via la table registrations). */
    public function participants()
    {
        return $this->belongsToMany(User::class, 'registrations')
            ->withPivot(['status', 'registered_at']);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // ------- Statistiques rapides -------

    public function attendanceRate(): float
    {
        $total = $this->registrations()->count();
        if ($total === 0) {
            return 0.0;
        }
        $present = $this->registrations()->where('status', 'present')->count();

        return round(($present / $total) * 100, 1);
    }
}
