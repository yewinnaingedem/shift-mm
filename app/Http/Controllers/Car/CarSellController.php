<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Car ;
use Illuminate\Support\Facades\Validator;
use App\Models\Car\Sale ;

class CarSellController extends Controller
{
    
    public function index()
    {
        $sales = Sale::select('car_models.model_name','owner_books.license_state','owner_books.license_plate','grades.grade','sales.id')
                    ->leftJoin('cars','sales.car_id','cars.id')
                    ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                    ->leftJoin('items','cars.item_id','items.id')
                    ->leftJoin('car_models','owner_books.model_id','car_models.id')
                    ->leftJoin('grades','items.grade','grades.id')
                    ->get();
        return view('admin.POS.Car.Sale.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json('hi');
        $validator = Validator::make(
            $request->all() ,
            [
                'id' => 'required' ,
            ]
        );  
        if($validator->fails()){
            return response()->json('some error occuring in database');
        }
        $existId = Sale::where('car_id',$request['id'])->exists();
        if($existId) {
            return response()->json('you already created');
        }
        $inputs = [];
        $inputs['car_id'] = $request['id'];
        Sale::insert($inputs);
        return response()->json('you saled this item');
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
        $test = Sale::find($id)->delete();
        return response()->json('You deleted the Sale Item successfully');
    }
}
