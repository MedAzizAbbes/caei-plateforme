<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['seminar_id', 'user_id', 'thread_label', 'content'];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
