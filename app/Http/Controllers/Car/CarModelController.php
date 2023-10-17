<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand ;
use App\Models\CarModel ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car_models = CarModel::select('brands.brand_name' , 'car_models.created_at' , 'car_models.id' , 'car_models.model_name')
                    ->leftJoin('brands' , 'car_models.brand_id' , 'brands.id')
                    ->get();
        return view('admin.POS.Car_Model.index' ,compact('car_models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::get();
        return view('admin.POS.Car_Model.create' , compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse 
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'brand' => 'required' ,
                'car_model' => 'required'
            ]
        );
        if($validator->fails()) {
            return redirect('admin/car_models/create')->withErrors($validator)->withInput() ;
        }

        $inputs = [] ;
        $inputs['brand_id'] = $request['brand'] ;
        $inputs['model_name'] = $request['car_model'];
        $inputs['created_at'] = Carbon::now();

        CarModel::insert($inputs) ;
        return redirect('admin/car_models')->with('message' , 'you created the record successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CarModel::where('id' , $id)->delete();
        return response()->json('you deleted the record successfully');
    }
}
