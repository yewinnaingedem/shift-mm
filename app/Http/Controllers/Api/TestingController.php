<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basic ;
use App\Models\CarInfo ;
use App\Models\Fucture ;
use DB ;

class TestingController extends Controller
{
    public function index(Request $request  ) {
        $id = $request['id'] ;
        if(Basic::where('modal_name' ,$id)->exists() || CarInfo::where('modal_name' ,$id)->exists() || Fucture::where('modal_name' , $id)->exists()){ // it retrun ture or false
            return response()->json('You already created this data');
        }
        // $exists = DB::table('basics')
        //         ->where('modal_name', $id)
        //         ->orWhereExists(function ($query) use ($id) {
        //             $query->select(DB::raw(1))
        //                 ->from('car_infos')
        //                 ->whereColumn('basics.modal_name', '=', 'car_infos.modal_name')
        //                 ->where('car_infos.modal_name', $id);
        //         })
        //         ->orWhereExists(function ($query) use ($id) {
        //             $query->select(DB::raw(1))
        //                 ->from('fuctures')
        //                 ->whereColumn('basics.modal_name', '=', 'fuctures.modal_name')
        //                 ->where('fuctures.modal_name', $id);
        //         })
        //         ->exists() ;
        // if($exists) {
        //     return response()->json('you created the data');
        // }
        // insert into Basic Table ;
        $basic = $request['field'][0] ;
        $basic['modal_name'] = $id ;
        $basicTable = Basic::insertGetId($basic);
        // insert into Car Info Table ;
        $car_infos = $request['field'][1] ;
        $car_infos['modal_name'] = $id ;
        $car_infoTable = CarInfo::insertGetId($car_infos);
        $fuctures = $request['field'][2] ;
        $fuctures['modal_name'] = $id ;
        $fuctureTable =  Fucture::insertGetId($fuctures);
        if($basicTable || $car_infoTable || $fuctureTable) {
            return response()->json([
                'status' => "success" ,
                'message' => 'you updated the data' ,
                'redirect_url' => '/admin/car-info'
            ],200);
        }else {
            Basic::find($basicTable)->delete() ;
            CarInfo::find($car_infoTable)->delete() ;
            Fucture::find($fuctureTable)->delete() ;
            return response()->json('Please Try Again');
        }
    }
    public function setup() {
        return response()->json('You will move to the another page');
    }
}
