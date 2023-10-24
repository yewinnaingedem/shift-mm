<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    use HasFactory;

    protected $fillable = [
        'Enigne_power' ,
        'Fuel' ,
        'Turbo' 
    ];

    public static $rules = 
    [
        'Enigne_power' => 'required' ,
        'Fuel' => 'required' 
    ];
}
