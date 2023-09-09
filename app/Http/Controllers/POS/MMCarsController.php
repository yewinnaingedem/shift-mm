<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
class MMCarsController extends Controller
{
    public function index() {
        return view('MM.index');
    }
}
