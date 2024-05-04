<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutomobileSale extends Model
{
    use HasFactory;
    public $fillable = [
        'car_id' ,
        'company_id' ,
    ];
}
