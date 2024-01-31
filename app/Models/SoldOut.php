<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldOut extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $dateFormat = 'Y-m-d';
}
