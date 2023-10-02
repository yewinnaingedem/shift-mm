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

        $data = $this->leftJoin($key);

        return redirect('admin/'. $data['year'] .'/'.$data['brand_name'].'/'.$data['name'] .'/'. $key);
        
    }

    public function stepProgess ($make , $model , $year , $id) {
        $data = $this->leftJoin($id);               
        return view('admin.cars.stepProgess')->with('data' , $data);
    }
    public function leftJoin($id) {
        return  Modal::select('modals.modal_name as name' , 'brands.brand_name as brand_name' ,'years.year as year')
                        ->leftJoin('brands','modals.brand_id','brands.id')
                        ->leftJoin('years','modals.year_id','years.id')
                        ->where('modals.id',$id)
                        ->first() ;
    }
    public function routeTest($model_year , $make , $modal ) {
        dd($modal , $make , $model_year);
    }
}
