<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Modal ;
use App\Models\CarModel ;
use App\Models\Grade ;
use App\Models\Transmission ;
use App\Models\TransmissionType ;
use App\Models\Brand ;
use App\Models\Divertrim ;
use App\Models\ExteriorColor ;
use App\Models\Steering ;
use App\Models\Car\OwnerBook ;
use App\Models\LicenseState ;

class ModelController extends Controller
{
    public function Customize ( $model , $make , $modal , $key ) {
        return new \App\Http\Controllers\Api\Customize($model , $make , $modal , $key);
    }
    
    public function index (Request $request ) {
        $validator = Validator::make(
            $request->all() ,
            [
                'model_year' => 'required' ,
                'make'  => 'required' ,
                'model' => 'required' ,
            ]
        );  
        $year = $request['model_year'] ;
        $brand = Brand::where('id' , $request['make'])->first();
        $model = CarModel::where('id' , $request['model'])->first() ;
        return redirect('admin/car/'. $year  .'/'. $brand->brand_name .'/'. $model->model_name);
    }

    public function stepProgess ($make , $model , $year) {
            $data['main'] = [ 'year'=>$make , 'make'=>$model , 'model'=>$year ] ;
            $data['exterior_colors'] = ExteriorColor::get();
            $brandId = CarModel::where('model_name',$year)->first('id');
            $data['grades'] = Grade::where('carModel_id',$brandId->id)->get();
            $data['steerings'] = Steering::get();
            $data['transmissionTypes'] = TransmissionType::get();
            $data['id']  = $brandId ;
            $data['license-states'] = LicenseState::get();
        return view('admin.cars.stepProgess',compact('data'));
    }
    public function leftJoin($id) {
        $data =  Modal::select('modals.modal_name as name' , 'modals.id', 'brands.brand_name as brand_name' ,'years.year as year')
                        ->leftJoin('brands','modals.brand_id','brands.id')
                        ->leftJoin('years','modals.year_id','years.id')
                        ->where('modals.id',$id)
                        ->first() ;
        return $data ;
    }


    public function searchQuery(Request $request) {
        $query = $request->input('searchQuery');
        $results = OwnerBook::where('license_plate',$query)->exists() ? true : false  ;
        return response()->json([
            'message' => $results ,
        ]);
        // $inputData = OwnerBook::pluck('license_plate')->implode(' '); // getting the data base data ;
        // $count = substr_count($inputData , $query);

        // return response()->json($count);
    }
}
