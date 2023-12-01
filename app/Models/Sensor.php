<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Sensor extends Model
{
    use HasFactory;
    protected $table = "sensor";
    protected $fillable = [
        'id_sensor',
        'lahan_id',
        'tanggal_aktivasi',
        ];
}
