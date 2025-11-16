<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quotes';

    protected $fillable = [
        'author_id',
        'quote',
        'source',
        'cover_image',
        'status',
        'published_at',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
