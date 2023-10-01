<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index(Request $request  ) {
        return response()->json($request['field'][0]);

    }
    public function setup() {
        dd('hi');
    }
}
