<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand ;
use App\Models\Year ;
use App\Models\Modal ;
use App\Models\CarInfo ;
use App\Models\Fucture ;

class AdminAuthController extends Controller
{
    public function index() {
        return view('admin.main.index');
    }

    public function addCars() {
        $brands = Brand::get();
        $modals = Modal::get();
        $years = Year::get();
        return view('admin.cars.add-car',compact('brands','years','modals'));
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
        $car_infos = Fucture::select('modals.modal_name as name ', 'fuctures.modal_name as id' ,'fuctures.*','car_infos.*' , 'basics.*' , 'modals.*')
                            ->leftJoin('modals','fuctures.modal_name','modals.id')
                            ->leftJoin('basics','modals.id','basics.modal_name')
                            ->leftJoin('car_infos','modals.id','car_infos.modal_name')
                            ->where('fuctures.modal_name','=',$id)
                            ->get();

                            // SELECT modals.modal_name FROM fuctures LEFT JOIN modals on fuctures.modal_name = modals.id WHERE modals.modal_name = 6;

        // return view('admin.Cars.show',compact('car_infos'));
        
        return response()->json($car_infos);
    }
}
