<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modal ;
use Carbon\Carbon ;
use App\Models\Car\Item ;
use App\Models\Car\OwnerBook ;
use App\Models\Car\Car ;


class AddCarController extends Controller
{
    public function index (Request $request) {
        $data1 = $request['field'][0] ;
        $data2 = $request['field'][1];
        $data3 = $request['field'][2];
        $model_id = $request['model_Id'];
        $year = $request['year'];
        $items = [] ;
        $items['warranty'] = $data2['warranty'] ;
        $items['steering_coner'] = $data2['steering'] ;
        $items['place_of_orgin'] = $data2['madeIn'] ;
        $items['number_seats'] = $data2['num_seat'];
        $items['interior_color'] = $data3['interior_color'] ;
        $items['kilo_meter'] = $data1['millage'] ;
        $items['grade'] = $data1['grade'];
        $items['break'] = $data2['font_break'] .'/'. $data2['back_break'];

        $itemId = Item::insertGetId($items);
        
        $carOwners = [] ;
        $carOwners['vin'] = $data3['VIN'] ;
        $carOwners['exterior_color_id'] = $data1['exterior_color'];
        $carOwners['license_state'] = $data2['license_state'];
        $carOwners['model_id'] = $model_id ;
        $carOwners['year'] = $year ;
        $carOwners['license_plate'] = $data1['license'];
        $carOwners['pass_owner'] = $data2['pass_owner'] ;
        $carOwners['transmission_type'] = $data1['transmission'];
        $carOwners['engine_exception'] = $data3['engine_exception'] ;
        $carOwners['license_exception'] = $data3['license_exception'] ;
        $carOwners['exception'] = $data3['exception'];
        $carOwnerId = OwnerBook::insertGetId($carOwners);
        $cars = [];
        $cars['item_id'] = $itemId ;
        $cars['owner_book_id'] = $carOwnerId ;
        $cars['year'] = $year ;
        session(['car_datas' => $cars]);
        $response = [
            'success' => true ,
            'message' => 'You Sumbit The Form Data Successfully',
            'redirect' => '/admin/car_img/create',
        ];
        return response()->json($response);
    }
    public function sessionCheck () {
        return session()->has('id') ? session()->get('id') : '' ;
    }
}
