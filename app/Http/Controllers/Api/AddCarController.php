<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modal ;
use Carbon\Carbon ;
use App\Models\Basic ;
use App\Models\CarInfo ;
use App\Models\Fucture ;
use App\Models\Brand;
use App\Models\Year;
use App\Models\Item ;

class AddCarController extends Controller
{
    public function index (Request $request) {
        // $validator = Validator::make (
        //     $request->all(),
        //     [
        //         'linces' => 'required' ,
        //         'millage' => 'required' ,
        //         'grade' => 'required' ,
        //         'license_state'
        //     ]
        // );
        $data1 = $request['field'][0] ;
        $data2 = $request['field'][1];
        $data3 = $request['field'][2];
        $basics = [] ;
        $basics['license'] = $data1['license'] ;
        $basics['millages'] = $data1['millage'] ;
        $basics['grade'] = $data1['grade'] ;
        $basics['steering_id'] = $data2['steering'];
        $basics['exterior_color'] = $data1['exterior_color'] ;
        
        $carOwners = [] ;
        $carOwners['VIN'] = $data3['VIN'] ;
        $carOwners['pass_owner'] = $data3['pass_owner'];
        $carOwners['car_license'] = $data3['car_license'];
        $carOwners['exception'] = $data3['addtional'] ;
        
        return response()->json($basics);

    }
    public function sessionCheck () {
        return session()->has('id') ? session()->get('id') : '' ;
    }
}
