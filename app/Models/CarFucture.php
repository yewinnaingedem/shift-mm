<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFucture extends Model
{
    use HasFactory;
    protected $table = 'car_fuctures' ;
    protected $fillable = [
        'grade_id' ,
        'seat_id' ,
        'sun_roof_id' ,
        'sonor_id' ,
        'key_id' ,
        'aircon_id' ,
        'motor_id' ,
        'transmission_id' ,
        'divertrim_id', 
        'bodyStyle_id' ,
        'engine_id' 
    ];
}
