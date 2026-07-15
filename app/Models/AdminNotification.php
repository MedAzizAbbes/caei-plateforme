<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    protected $fillable = [
        'type',
        'title',
        'message',
        'icon',
        'related_user_id',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    // ------- Relations -------

    /** The user this notification is about (e.g. the new participant). */
    public function relatedUser()
    {
        return $this->belongsTo(User::class, 'related_user_id');
    }

    // ------- Scopes -------

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    // ------- Helpers -------

    /** Create a notification for a newly registered participant. */
    public static function notifyNewParticipant(User $user): self
    {
        return self::create([
            'type'            => 'new_participant',
            'title'           => 'Nouveau participant',
            'message'         => $user->fullName() . ' vient de créer un compte.',
            'icon'            => '👤',
            'related_user_id' => $user->id,
        ]);
    }
}
