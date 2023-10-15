<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modal ;
use Carbon\Carbon ;
use App\Models\Basic ;
use App\Models\CarInfo ;
use App\Models\Fucture ;
use App\Models\Item ;

class AddCarController extends Controller
{
    public function index (Request $request) {

        $modals = [] ;
        $modals['brand_id'] = $request['modal']['make'] ;
        $modals['year_id'] = $request['modal']['year'] ;
        $modals['modal_name'] = $request['modal']['model'] ;
        $model = Modal::insertGetId($modals);
        
        $basices= $request['field'][0] ;
        $basicTable = Basic::insertGetId($basices);
        
        $car_infos = $request['field'][1] ;
        $car_infoTable = CarInfo::insertGetId($car_infos);
        
        $fuctures = $request['field'][2];
        $fuctureTable =  Fucture::insertGetId($fuctures);

        $items = [] ;
        $items['modal_Id'] = $model ;
        $items['basic_Id'] = $basicTable ;
        $items['fucture_Id'] = $fuctureTable ;
        $items['car_info_Id'] = $car_infoTable ;
        $items['created_at'] = Carbon::now();

        $item = Item::insertGetId($items);
        return response()->json('you created the data'. (session()->has('id')?session()->get('id') : ''));
    }
    public function sessionCheck () {
        return session()->has('id') ? session()->get('id') : '' ;
    }
}
