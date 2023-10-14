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
    $car_infos = CarInfo::select('car_infos.*','brands.id','brands.brand_name as name','years.year as year','basics.exterior_color as color','modals.modal_name as modal','modals.id as main_id')
                ->leftJoin('modals' , 'car_infos.modal_name' , 'modals.id')
                ->leftJoin('brands','modals.brand_id','brands.id')
                ->leftJoin('years','modals.year_id','years.id')
                ->leftJoin('basics','modals.id','basics.modal_name')
                ->get();

        return view('admin.Cars.info')->with('car_infos' , $car_infos);
    }

    public function details ( $id ) {
        $data['car_infos'] = Fucture::select('modals.modal_name as name ', 'fuctures.modal_name as id' ,'fuctures.*','car_infos.*' , 'basics.*' , 'modals.*')
                            ->leftJoin('modals','fuctures.modal_name','modals.id')
                            ->leftJoin('basics','modals.id','basics.modal_name')
                            ->leftJoin('car_infos','modals.id','car_infos.modal_name')
                            ->where('fuctures.modal_name','=',$id)
                            ->first();
        $data['car_data'] = Modal::select('brands.brand_name','years.year','modals.modal_name')
                        ->leftJoin('brands','modals.brand_id','brands.id')
                        ->leftJoin('years','modals.year_id','years.id')
                        ->where('modals.id','=',$id)
                        ->first();
        $data['engines'] = Engine::get();
        $data['transmissions'] = Transmission::get() ;
        $data['exterior_colors'] = ExteriorColor::get();
        $data['body_styles'] = BodyStyle::get();
        $data['keys'] = Key::get();
        $data['sonors'] = Sonor::get();
        $data['sun_roofs'] = SunRoof::get();
        $data['cameraes'] = Camera::get();
        $data['seats'] = Seat::get() ;
        $data['divertrimes'] = Divertrim::get();
        return response()->json( $data);
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
