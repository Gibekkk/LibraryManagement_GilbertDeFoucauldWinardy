<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'publisher',
        'release_year',
        'genre',
    ];
}
