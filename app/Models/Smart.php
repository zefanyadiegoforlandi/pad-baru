<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Buku extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = [
        'id',
        'judul',
        'penulis',
        'harga',
        'tgl_terbit',
        'created_at', 
        'updated_at', 
        'filename', 
        'filepath'
        ];
        
}
