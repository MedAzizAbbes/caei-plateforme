<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    protected $fillable = [
        'slug', 'title', 'subtitle', 'category', 'date', 'location', 
        'country_badge', 'theme', 'partner', 'summary', 'content', 
        'main_image', 'main_image_alt', 'gallery_title', 'gallery'
    ];

    protected $casts = [
        'partner' => 'array',
        'content' => 'array',
        'gallery' => 'array',
    ];
}
