<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Before_Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_item'
    ];
}
