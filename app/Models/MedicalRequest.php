<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'country',
        'service_type',
        'preferred_date',
        'message',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];
}
