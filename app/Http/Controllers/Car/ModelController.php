<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModelController extends Controller
{
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

        $input = []; 
        $input['model_year'] = $request['model_year'] ;
        $input['make']  = $request['make'] ;
        $input['modal'] = $request['modal'] ;

        $datas = [] ;
        foreach ($input as $data ) {
            array_push($datas , $data);
        }
        session()->put('data' , $datas);

        return redirect('admin/step-progess')->with('datas' , $datas );
    }

    public function stepProgess () {
        $datas = session()->has('data') ? session()->get('data') : [] ;
        return view('admin.cars.stepProgess' , compact('datas'));
    }

    public function routeTest($model_year , $make , $modal) {
        dd($modal , $make , $model_year);
    }
}
