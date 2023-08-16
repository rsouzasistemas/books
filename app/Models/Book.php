<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'publication_year',
        'img_path',
        'description'
    ];

    public function bookAuthor() : BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
