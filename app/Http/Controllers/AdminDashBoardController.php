<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashBoardController extends Controller
{
    public function index () {
        return view('Admin.Dashboard.index');
    }
}
