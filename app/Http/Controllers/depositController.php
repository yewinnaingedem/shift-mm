<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class depositController extends Controller
{
    public function index () {
        if(Auth::user()){
            return response()->json('User have login');
        }
        return response()->json('User does not have login');
    }
}
