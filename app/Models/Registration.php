<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'seminar_id', 'status', 'registered_at'];

    protected $casts = [
        'registered_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function qrCode()
    {
        return $this->hasOne(QrCode::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function markPresent(): void
    {
        $this->update(['status' => 'present']);
    }
}
