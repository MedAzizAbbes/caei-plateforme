<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminar_id', 'uploaded_by', 'title', 'type', 'file_path', 'day_number', 'size_kb',
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function dayLabel(): string
    {
        return 'Jour ' . $this->day_number;
    }
}
