<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Modal ;
use App\Models\Engine ;
use App\Models\Key ;
use App\Models\SunRoof ;
use App\Models\Year ;
use App\Models\Brand ;
use App\Models\Item ;
use App\Models\CarModel ;
use App\Models\Transmission ;
use App\Models\Divertrim ;
use App\Models\ExteriorColor ;
use App\Models\BodyStyle ;
use App\Models\Sonor ;
use App\Models\Camera ;
use App\Models\Seat ;

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
        // $data = CarModel::select('brands.brand_name' , 'car_models.model_name')
        //             ->leftJoin('brands', 'car_models.brand_id' , 'brands.id')
        //             ->where('car_models.brand_id' , $request['model'])
        //             ->first() ;
        return redirect('admin/'. $year  .'/'. $brand->brand_name .'/'. $model->model_name);
    }

    public function stepProgess ($make , $model , $year) {
        
        // $brand = Brand::select('id')->where('brand_name' , $model )->first() ;
        // $year_Id = Year::select('id')->where('year' , $make )->first() ;
        // $hasbrand = Modal::where('brand_id' , $brand->id)->exists();
        // $hasYear = Modal::where('year_id' , $year_Id->id)->exists();
        // $hasModel = Modal::where('modal_name' , $year)->exists();
        // if($hasbrand && $hasYear && $hasModel) {
        //     $existId = Modal::where('modal_name',$year)->first('id');
        //     $existData = Item::where('fucture_Id' , $existId->id)->first();
        //     dd('success');
        // }else {
        //     $data['main'] = [ 'year'=>$make , 'make'=>$model , 'model'=>$year ] ;
        //     $data['engines'] = Engine::get();
        //     $data['transmissions'] = Transmission::get() ;
        //     $data['exterior_colors'] = ExteriorColor::get();
        //     $data['body_styles'] = BodyStyle::get();
        //     $data['keys'] = Key::get();
        //     $data['sonors'] = Sonor::get();
        //     $data['cameraes'] = Camera::get();
        //     $data['seats'] = Seat::get() ;
        //     $data['sun_roofs'] = SunRoof::get();
        //     $data['divertrimes'] = Divertrim::get();
        // }

        return view('admin.cars.stepProgess');
    }
    public function leftJoin($id) {
        $data =  Modal::select('modals.modal_name as name' , 'modals.id', 'brands.brand_name as brand_name' ,'years.year as year')
                        ->leftJoin('brands','modals.brand_id','brands.id')
                        ->leftJoin('years','modals.year_id','years.id')
                        ->where('modals.id',$id)
                        ->first() ;
        return $data ;
    }
    public function routeTest($model_year , $make , $modal ) {
        dd($modal , $make , $model_year);
    }
}
