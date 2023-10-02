<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basic ;
use App\Models\CarInfo ;
use App\Models\Fucture ;

class TestingController extends Controller
{
    public function index(Request $request  ) {
        $id = $request['id'] ;
        $basic = $request['field'][0] ;
        $basic['modal_name'] = $id ;
        Basic::insert($basic);

        $car_infos = $request['field'][1] ;
        $car_infos['modal_name'] = $id ;
        CarInfo::insert($car_infos);

        $fuctures = $request['field'][2] ;
        $fuctures['modal_name'] = $id ;
        Fucture::insert($fuctures);

        $db  = 'You creted successfully' ;

        return response()->json($db);
    }
    public function setup() {
        dd('hi');
    }
}
