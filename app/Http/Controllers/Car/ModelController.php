<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand ;

class ModelController extends Controller
{
    public function Customize ( $model , $make , $modal ) {
        $data = new \App\Http\Controllers\Api\Customize($model , $make , $modal);
        return $data ;
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
        $input['model_year'] = $model ;
        $input['make']  = $make  ;
        $input['modal'] = $modal ;
        
        $data = $this->Customize($model , $make , $modal) ;
        return redirect('admin/'.$model.'/'.$make.'/'.$model);

    }

    public function stepProgess ($make , $model , $year) {
        $data = $this->Customize($make , $model , $year);
        return view('admin.cars.stepProgess' , compact('data'));
    }

    public function routeTest($model_year , $make , $modal) {
        dd($modal , $make , $model_year);
    }
}
