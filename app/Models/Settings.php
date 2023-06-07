<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_logo', 'brand_text', 'blogs_slug', 'global_author', 'global_keywords', 'global_description', 'image'
    ];
}
