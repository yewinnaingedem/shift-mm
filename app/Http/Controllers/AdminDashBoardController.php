<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoldOut ;
use Carbon\Carbon ;
class AdminDashBoardController extends Controller
{
    public function index () {
        $currentDay = Carbon::now()->format('Y-m-d');
        $todaySold = SoldOut::where('created_at' , $currentDay)->count();
        return view('Admin.Dashboard.index' , compact('todaySold'));
    }

    public function SaledFor2Day() {
        return view('Admin.Dashboard.saledFor2Day');
    }
    
}
