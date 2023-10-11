<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fucture extends Model
{
    use HasFactory;

    protected $fillable = [
        'blind_sprot',
        'lane_keep_assit' ,
        'streeing_volume' ,
        'rounded_ac' ,
        'sun_roofs' ,
        'auto_headlight' ,
        'camera' ,
        'rain_sensor' ,
        'auto_em_b' ,
        'auto_hold' ,
        'abs' ,
        'tire_pressure' ,
        'seat_leather' ,
        'kick_sensor' ,
        'truck_motor' ,
        'key' ,
        'sonor'
    ];
}
