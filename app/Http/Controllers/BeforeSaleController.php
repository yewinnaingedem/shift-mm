<?php

namespace App\Http\Controllers;

use App\Models\Before_Sale ;
use App\Models\Car\Sale ;
use Illuminate\Http\Request;
use App\Models\CarImage ;
use App\Models\Car\Car ;
use App\Models\Grade ;
use App\Models\Transmission ;

class BeforeSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carItems = Before_Sale::select('items.*' , 'cars.id as car_id','owner_books.*','grades.grade','cars.created_at','car_models.model_name' , 'before__sales.car_item')
                    ->leftJoin('cars','before__sales.car_item','cars.id')
                    ->leftJoin('items','cars.item_id' , 'items.id')
                    ->leftJoin('owner_books' , 'cars.owner_book_id' ,'owner_books.id')
                    ->leftJoin('car_models','owner_books.model_id','car_models.id')
                    ->leftJoin('steerings','items.steering_coner','steerings.id')
                    ->leftJoin('grades','items.grade','grades.id')
                    ->get();
        $saledItems = Sale::get('car_id');
        return view('Admin.POS.Car.CarItem.index' , compact('carItems','saledItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $showData = Car::select()
                    ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                    ->leftJoin('car_images','cars.car_image_id','car_images.id')
                    ->leftJoin('items','cars.item_id','items.id')
                    ->where('cars.id',$id)
                    ->first();
        $showData['grades'] = Grade::get();
        $showData['transmissions'] = Transmission::get();
        return view('Admin.POS.Car.CarItem.Show',compact('showData'));
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
        Before_Sale::where( 'car_item', $id)->delete();
        Sale::where( 'car_id', $id)->delete();
        return response()->json("Your imaginary file has been deleted.");
    }
}
