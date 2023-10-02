<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Modal ;

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
        // $data = $this->Customize($model , $make , $modal , $key) ;
        return redirect('admin/'.$model.'/'.$make.'/'.$model .'/'. $key)->with('data' , $input);
        
    }

    public function stepProgess ($make , $model , $year , $id) {
        $datas = Modal::where('id',$id)->first();
        return view('admin.cars.stepProgess')->with('data' , $datas);
    }

    public function routeTest($model_year , $make , $modal ) {
        dd($modal , $make , $model_year);
    }
}
