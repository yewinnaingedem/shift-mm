<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index(Request $request) {
        $basic = $request[0];
        $testing = [];
        foreach ($basic as $value => $keys) {
            
        }

        return response()->json($testing);
    }
    public function setup() {
        dd('hi');
    }
}
