<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Modal ;
use App\Models\Engine ;
use App\Models\Key ;
use App\Models\SunRoof ;
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
                'modal' => 'required' ,
            ]
        );  

        if($validator->fails()) {
            return redirect('admin/add-cars')->withErrors($validator)->withInput() ;
        }
        $model = $request['model_year'] ;
        $make = $request['make'] ;
        $modal = $request['modal'] ;
        $input = []; 
        $input['brand_id'] = $make ;
        $input['year_id']  = $model ;
        $input['modal_name'] = $modal ;
        $key = Modal::insertGetId($input);
        $data = $this->leftJoin($key);
        $data['engines'] = Engine::get();
        $data['transmissions'] = Transmission::get() ;
        $data['exterior_colors'] = ExteriorColor::get();
        $data['body_styles'] = BodyStyle::get();
        $data['keys'] = Key::get();
        $data['sonors'] = Sonor::get();
        $data['cameraes'] = Camera::get();
        $data['seats'] = Seat::get() ;
        $data['divertrimes'] = Divertrim::get();
        return redirect('admin/'. $data['year'] .'/'.$data['brand_name'].'/'.$data['name'] .'/'. $key);
    }

    public function stepProgess ($make , $model , $year , $id) {
        $data['main'] = $this->leftJoin($id);      
        $data['engines'] = Engine::get();
        $data['transmissions'] = Transmission::get() ;
        $data['exterior_colors'] = ExteriorColor::get();
        $data['body_styles'] = BodyStyle::get();
        $data['keys'] = Key::get();
        $data['sonors'] = Sonor::get();
        $data['cameraes'] = Camera::get();
        $data['seats'] = Seat::get() ;
        $data['divertrimes'] = Divertrim::get();
        return view('admin.cars.stepProgess')->with('data' , $data);
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
