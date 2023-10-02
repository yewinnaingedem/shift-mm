<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basic ;

class TestingController extends Controller
{
    public function index(Request $request  ) {
        $id = $request['id'] ;
        $main = $request['field'][0] ;
        $main['modal_name'] = $id ;
        Basic::insert($main);
        $db  = 'You creted successfully' ;
        return response()->json($db);
    }
    public function setup() {
        dd('hi');
    }
}
