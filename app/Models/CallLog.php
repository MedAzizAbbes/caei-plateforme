<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CallLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminar_id',
        'caller_id',
        'callee_id',
        'type',
        'status',
        'room_name',
        'started_at',
        'ended_at',
        'duration_seconds',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at'   => 'datetime',
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function caller()
    {
        return $this->belongsTo(User::class, 'caller_id');
    }

    public function callee()
    {
        return $this->belongsTo(User::class, 'callee_id');
    }

    public function durationFormatted(): string
    {
        $seconds = (int) $this->duration_seconds;
        if ($seconds <= 0) {
            return '0:00';
        }
        $h = intdiv($seconds, 3600);
        $m = intdiv($seconds % 3600, 60);
        $s = $seconds % 60;
        if ($h > 0) {
            return sprintf('%d:%02d:%02d', $h, $m, $s);
        }
        return sprintf('%d:%02d', $m, $s);
    }

    public function isRinging(): bool
    {
        return $this->status === 'ringing';
    }

    public function isActive(): bool
    {
        return $this->status === 'accepted';
    }

    public function scopeRinging($query)
    {
        return $query->where('status', 'ringing')
                     ->where('created_at', '>=', now()->subSeconds(30));
    }
}
