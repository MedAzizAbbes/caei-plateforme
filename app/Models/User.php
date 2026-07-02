<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'institution',
        'password', 'role', 'participant_code',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ------- Relations -------

    /** Séminaires auxquels ce participant est inscrit. */
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    /** Séminaires où cet utilisateur intervient comme formateur. */
    public function seminarsAsTrainer()
    {
        return $this->belongsToMany(Seminar::class, 'seminar_trainer');
    }

    /** Séminaires créés par cet admin. */
    public function seminarsCreated()
    {
        return $this->hasMany(Seminar::class, 'created_by');
    }

    public function documentsUploaded()
    {
        return $this->hasMany(Document::class, 'uploaded_by');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // ------- Helpers de rôle -------

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isFormateur(): bool
    {
        return $this->role === 'formateur';
    }

    public function isParticipant(): bool
    {
        return $this->role === 'participant';
    }

    public function fullName(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    public function getNameAttribute($value): string
    {
        return $this->fullName() ?: (string) $value;
    }

    public function setNameAttribute($value): void
    {
        $parts = preg_split('/\s+/', trim((string) $value), 2) ?: [];

        $this->attributes['first_name'] = $parts[0] ?? '';
        $this->attributes['last_name'] = $parts[1] ?? '';
    }
}
