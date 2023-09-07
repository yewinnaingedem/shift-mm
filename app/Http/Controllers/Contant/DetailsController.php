<?php

namespace App\Http\Controllers\Contant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index($carname , $id) {
        return view('MM.Main.details');
    }
}
