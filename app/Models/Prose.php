<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prose extends Model
{
    use HasFactory;

    protected $table = 'proses';

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
