<?php

namespace App\Http\Controllers\Financing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinancingController extends Controller
{
    public function index () {
        return view('MM.Main.Financing.Financing');
    }
}
