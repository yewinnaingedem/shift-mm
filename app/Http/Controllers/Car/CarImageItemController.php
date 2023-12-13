<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Car ;
use Carbon\Carbon ;
use App\Models\CarImage ;
use App\Models\Before_Sale ;
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
        return redirect('admin/cars')->with('message','You added to the cars table successfully') ;

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
