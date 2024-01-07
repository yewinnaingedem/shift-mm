<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Car ;
use Carbon\Carbon ;
use App\Models\CarImage ;
use App\Models\Before_Sale ;
use App\Models\Exception ;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CarImageItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
    }

    public function customize ($id) 
    {
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $car_datas = session()->has('car_datas') ? session()->get('car_datas') : FALSE ;
        if($car_datas){
            return view('Admin.POS.Img.create')->with('car_datas' , $car_datas);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $carImages = [];
        foreach ($request->file('img') as $key => $image) {
            $validatedData = $request->validate([
                'img.' . $key => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
            ]);
            $path = $image->store('carImages', 'public');
            $carImages[ 'img'.$key] = $path;
        }
        $imageId = CarImage::insertGetId($carImages);
        $finalDatas =  [] ;
        $finalDatas['item_id'] = $request['item_id'] ;
        $finalDatas['owner_book_id'] = $request['owner_book_id'] ;
        $finalDatas['car_image_id'] = $imageId ;
        $finalDatas['created_at'] = Carbon::now();
        $car_item = Car::insertGetId($finalDatas);
        $before_Sale = [] ;
        $before_Sale['car_item'] = $car_item ;
        $before_Sale['created_at'] = Carbon::now();
        Before_Sale::create($before_Sale);
        $exceptions = [];
        $exceptions['car_id'] = $car_item;
        if($request->has('all_good')) {
            $exceptions['engine_malfunction'] = 'none' ;
            $exceptions['paint_demage'] = 'none' ;
            $exceptions['tv'] = 'none';
            $exceptions['suspection'] = 'none';
            $exceptions['lights'] = 'none' ;
            $exceptions['addition_exception'] = 'none';   
            Exception::insert($exceptions);     
        }  else {
            $exceptions['engine_malfunction'] = $request->has('engine_malfunction') ? $request['engine_malfunction'] : 'none' ;
            $exceptions['pain_demange'] = $request->has('pain_demange') ? $request['pain_demange'] : 'none';
            $exceptions['paint_demage'] = $request->has('paint_demage') ?  $request['paint_demage'] : 'none';
            $exceptions['tv'] = $request->has('tv') ? $request['tv'] : 'none';
            $exceptions['suspection'] = $request->has('suspection') ? $request['suspection'] : 'none';
            $exceptions['lights'] = $request->has('light') ? $request['lights'] : 'none' ;
            $exceptions['addtional_exceptions'] = $request->has('addtional_exceptions') ? $request['addtional_exceptions'] : 'none';
            Exception::insert($exceptions);
        }
        
        
        return redirect('admin/before_sale')->with('message','You added to the cars table successfully') ;

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
        //
    }
}
