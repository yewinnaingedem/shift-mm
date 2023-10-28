<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Car ;

class CarItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carItems = Car::select('items.*' , 'cars.id as car_id','owner_books.*','grades.grade','cars.created_at','car_models.model_name')
                    ->leftJoin('items','cars.item_id' , 'items.id')
                    ->leftJoin('owner_books' , 'cars.owner_book_id' ,'owner_books.id')
                    ->leftJoin('car_models','owner_books.model_id','car_models.id')
                    ->leftJoin('steerings','items.steering_coner','steerings.id')
                    ->leftJoin('grades','items.grade','grades.id')
                    ->get();
        return view('Admin.POS.Car.CarItem.index' , compact('carItems'));
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
        // Car::find($id)->delete();
        return response()->json($id);
    }
}
