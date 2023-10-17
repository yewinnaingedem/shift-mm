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

        $modals = [] ;
        $brand_name = $request['modal']['make'] ;
        $brand = Brand::select('id')->where('brand_name' , $brand_name)->first() ;
        $year_name =  $request['modal']['year']  ;
        $year = Year::select('id')->where('year',$year_name)->first();
        $modal = $request['modal']['model'] ;
        $modals['year_id'] = $year->id;
        $modals['brand_id'] = $brand->id ;
        $modals['modal_name'] =  $modal ;
        // $hasData = Modal::where('brand_id' , $brand->id)->where('years_id' , $year)->where('modal_name' , $modal)->exists() ;
        
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
        return response()->json('You created the data record');
    }
    public function sessionCheck () {
        return session()->has('id') ? session()->get('id') : '' ;
    }
}
