<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function index() {
        return view('admin.main.index');
    }

    public function addCars() {
        return view('admin.cars.add-car');
    }
}
