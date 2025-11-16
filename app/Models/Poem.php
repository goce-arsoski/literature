<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    use HasFactory;

    protected $table = 'poems';

    protected $fillable = [
        'author_id',
        'cover_image',
        'title',
        'content',
        'published_at',
        'status',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
