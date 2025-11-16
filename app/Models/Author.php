<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'name',
        'bio',
        'photo',
    ];

    public function proses() {
        return $this->hasMany(Prose::class);
    }

    public function poems() {
        return $this->hasMany(Poem::class);
    }

    
}
