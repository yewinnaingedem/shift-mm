<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Car ;
use Carbon\Carbon ;
use App\Models\machine ;
use App\Models\CarImage ;
use App\Models\Before_Sale ;
use App\Models\Panding ;
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
    
    public function create()
    {
        $car_datas = session()->has('car_datas') ? session()->get('car_datas') : FALSE ;
        if($car_datas){
            return view('Admin.POS.Img.create')->with('car_datas' , $car_datas);
        }
    }
    
    public function  imgTest (Request $request) {
        $carImages = [];
        foreach ($request->file('img') as $key => $image) {
            $validatedData = $request->validate([
                'img.' . $key => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
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
        $before_Sale = [] ;
        
        $exceptions = [];
        $checkService = $request->has('show_room') ? true : false ;
        $NMVTIS = $request->has('NMVTIS') ? true : false ;
        $valid = true ;
        if($request->has('all_good')  ) {
            if($checkService || $NMVTIS ) {
                $exceptions['checkedAtShowroom'] = $checkService ;
                $exceptions['NMVTIS'] = $NMVTIS ;
                $exceptionId = Exception::insertGetId($exceptions) ;
                $valid = false ;
            }
            if(!$valid) {
                $finalDatas['exception_id'] = $exceptionId ;
            }
                $car_item = Car::insertGetId($finalDatas);
                $before_Sale['car_item'] = $car_item ;
                Before_Sale::create($before_Sale);
                return response()->json([
                    'message' => 'success' ,
                    'redirect' => 'http://localhost:8000/admin/before_sale'
                ]);
            
        }
        
        $exceptions['engineAndSuspension'] = $request['engineAndSuspension'] !== null ? $request['engineAndSuspension'] : null ;
        $exceptions['bodyAndPaint'] = $request['paintAndBody'] !== null ? $request['paintAndBody'] : null ;
        $exceptions['TvAndWiring'] = $request['tvAndWiring'] !== null ? $request['tvAndWiring'] : null ;
        $exceptions['addition_exception'] = $request['addtional_exception'] !== null ? $request['addtional_exception'] : null ;
        $exceptions['checkedAtShowroom'] = $checkService ;
        $exceptions['NMVTIS'] = $NMVTIS ;
        $exceptionId = Exception::insertGetId($exceptions);   
        $finalDatas['exception_id'] = $exceptionId ;
        $car_item = Car::insertGetId($finalDatas);
        $fixes = [] ;
        $fixes['car_id'] = $car_item ;
        $fixes['created_at'] = Carbon::now();
        Panding::insert($fixes);
        return response()->json([
            'message' => 'success' ,
            'redirect' => 'http://localhost:8000/admin/panding_state'
        ], 200);
    }

    public function store(Request $request)
    {
        // dd($request->all());
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
        $before_Sale = [] ;
        
        $exceptions = [];
        if($request->has('all_good')) {
            $exceptions['engine_malfunction'] = 'none' ;
            $exceptions['paint_demage'] = 'none' ;
            $exceptions['tv'] = 'none';
            $exceptions['suspection'] = 'none';
            $exceptions['lights'] = 'none' ;
            $exceptions['addition_exception'] = 'none';   
            $exceptionId = Exception::insertGetId($exceptions);   
            $finalDatas['exception_id'] = $exceptionId ;
            $car_item = Car::insertGetId($finalDatas);
            $before_Sale['car_item'] = $car_item ;
            $before_Sale['created_at'] = Carbon::now();
            Before_Sale::create($before_Sale);
            return redirect('admin/before_sale')->with('message','You added to the cars table successfully') ;
        }
        
        $exceptions['engine_malfunction'] = $request->engine_malfunction !== null ? $request['engine_malfunction'] : 'none' ;
        $exceptions['paint_demage'] = $request['paint_demage'] !== null ?  $request['paint_demage'] : 'none';
        $exceptions['tv'] = $request['tv'] !== null ? $request['tv'] : 'none';
        $exceptions['suspection'] = $request['suspection'] !== null ? $request['suspection'] : 'none';
        $exceptions['lights'] = $request['light'] !== null ? $request['light'] : 'none' ;
        $exceptions['addition_exception'] = $request['addtional_exception'] !== null ? $request['addtional_exception'] : 'none';
        $exceptionId = Exception::insertGetId($exceptions);   
        $finalDatas['exception_id'] = $exceptionId ;
        $car_item = Car::insertGetId($finalDatas);
        $fixes = [] ;
        $fixes['car_id'] = $car_item ;
        $fixes['created_at'] = Carbon::now();
        Panding::insert($fixes);
        
        return redirect('admin/panding_state')->with('message' , 'You added to the car in the panding state');
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
