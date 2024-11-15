<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;

    protected $fillable =[
        'judul',
        'librarianID',
        'penerbit',
        'penulis',
        'tahun_terbit',
        'ISBN',
        'isEbook',
        'ebookLink',
        'isBorrowed',
        'requestType',
    ];
}
