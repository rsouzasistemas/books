<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'zip_code',
        'address',
        'address_number',
        'address_complement',
        'district',
        'city',
        'federative_unity'
    ];
}
