<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand ;
use App\Models\Year ;
use App\Models\Modal ;
use App\Models\CarInfo ;
use App\Models\Fucture ;
use App\Models\Engine ;
use App\Models\Key ;
use App\Models\SunRoof ;
use App\Models\Basic ;
use App\Models\Transmission ;
use App\Models\Divertrim ;
use App\Models\ExteriorColor ;
use App\Models\BodyStyle ;
use App\Models\Sonor ;
use App\Models\Item ;
use App\Models\Camera ;
use App\Models\Seat ;
use Carbon\Carbon ;

class AdminAuthController extends Controller
{
    public function index() {
        return view('admin.main.index');
    }

    public function addCars() {
        $brands = Brand::get();
        $years = Year::get();

        return view('admin.cars.add-car',compact('brands','years'));
    }

    public function carInfo () {
        $items = Item::select('modals.*' , 'modals.modal_name' , 'items.id' , 'brands.brand_name' , 'years.year' , 'basics.license')
                ->leftJoin('modals', 'items.modal_Id' , 'modals.id')
                ->leftJoin('brands','modals.brand_id', 'brands.id')
                ->leftJoin('years', 'modals.year_id','years.id')
                ->leftJoin('basics', 'items.basic_Id','basics.id')
                ->get() ;
        
        return view('admin.Cars.info')->with('items' , $items);
    }

    public function details ( $id ) {
        $data['car_infos'] = Item::select()
                            ->leftJoin('basics' , 'items.basic_Id' , 'basics.id')
                            ->where('items.id','=',$id)
                            ->first();
        return response()->json($data['car_infos']);
    }

    public function deleteCard($id) {
        Modal::where('id' , $id)->delete();
        return response()->json('you deleted the successfully');
    }

    public function updateInfo ($id  , Request $request ) {
        // basic tabel
        $basics = [] ;
        $basics['license'] = $request['lincese'] ;
        $basics['millage'] = $request['kilo'] ;
        $basics['trim'] = $request['grade'] ;
        $basics['exterior_color'] = $request['exterior_color'] ;
        $basics['body_style'] = $request['body_style'] ;
        $basics['updated_at'] = Carbon::now() ;
        $basic = Basic::where('modal_name' , $id)->update($basics);

        // Fucture tabel 
        $fuctures = [] ;
        $fuctures['blind_sprot'] = $request['blind_sprot'] == "true" ? true : false ;
        $fuctures['lane_keep_assit'] = $request['lane_keep_assit'] == "true" ? true : false ;
        $fuctures['streeing_volume'] = $request['streeing_volume'] == "true" ? true : false ;
        $fuctures['rounded_ac'] = $request['rounded_ac'] == "true" ? true : false;
        $fuctures['sun_roof'] = $request['sun_roof'];
        $fuctures['auto_headlight'] = $request['auto_headlight'] == "true" ? true : false;
        $fuctures['camera'] = $request['camera'];
        $fuctures['rain_sensor'] = $request['rain_sensor'] === "true" ;
        $fuctures['auto_em_b'] = $request->auto_em_b == "true" ? true : false ;
        $fuctures['auto_hold'] = $request['auto_hold'] == "true" ? true : false ;
        $fuctures['abs'] = $request['abs'] == "true" ? true : false ;
        $fuctures['tire_pressure'] = $request['tire_pressure'] == "true" ? true : false;
        $fuctures['seat_leather'] = $request['seat'];
        $fuctures['kick_sensor'] = $request['kick_sensor'] == "true" ? true : false ;
        $fuctures['truck_motor'] = $request['truck_motor'] == "true" ? true : false ;
        $fuctures['key'] = $request['key'];
        $fuctures['sonor'] = $request['sonar'];
        $fucture = Fucture::where('modal_name' , $id)->update($fuctures) ;

        // Car Info Tabel
        $car_infos = [] ;
        $car_infos['transmission']  = $request['transmission'] ;
        $car_infos['divertrim']  = $request['divertrim'] ;
        $car_infos['engine']  = $request['enigne'] ;
        $car_info = CarInfo::where('modal_name' , $id)->update($car_infos) ;
        
        if($basic || $car_info || $fucture) {
            return response()->json('You updated the record successfully');
        }
        return response()->json($fuctures);

    }
}
