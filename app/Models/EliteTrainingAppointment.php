<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EliteTrainingAppointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'country',
        'job_title',
        'company',
        'subject',
        'session_date',
        'participation_mode',
        'source',
        'message',
        'type',
        'status',
        'admin_notes',
    ];
}
