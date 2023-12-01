<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Lahan extends Model
{
    use HasFactory;
    protected $table = "lahan";
    protected $fillable = [
        'id_lahan',
        'alamat_lahan',
        'luas_lahan',
        'id_user'
        ];
}
