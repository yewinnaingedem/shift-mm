<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand ;
use App\Models\Year ;
use App\Models\Modal ;

class AdminAuthController extends Controller
{
    public function index() {
        return view('admin.main.index');
    }

    public function addCars() {
        $brands = Brand::get();
        $modals = Modal::get();
        $years = Year::get();
        return view('admin.cars.add-car',compact('brands','years','modals'));
    }
}
