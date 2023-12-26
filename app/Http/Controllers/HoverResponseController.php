<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand ;
class HoverResponseController extends Controller
{
    public function index () {
        $data = Brand::get();
        return response()->json($data);
    }
}
