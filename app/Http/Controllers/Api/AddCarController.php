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
        $basics = $request['field'][0] ;
        $inputs = [] ;
        $inputs['license'] = $basics['license'] ;
        $inputs['millages'] = $basics['millage'] ;
        $inputs['grade'] = $basics['grade'] ;
        $inputs['exterior_color'] = $basics['exterior_color'] ;
        
        return response()->json($inputs);

    }
    public function sessionCheck () {
        return session()->has('id') ? session()->get('id') : '' ;
    }
}
