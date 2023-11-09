<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Car ;
use Illuminate\Support\Facades\Validator;
use App\Models\Car\Sale ;
use App\Models\Car\Item ;

class CarSellController extends Controller
{
    
    public function index()
    {
        $sales = Sale::select('car_models.model_name','owner_books.license_state','owner_books.license_plate','grades.grade','sales.id','sales.price')
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
        
        $validator = Validator::make(
            $request->all() ,
            [
                'id' => 'required' ,
                'price' => 'required'
            ]
        );  
        if($validator->fails()){
            return redirect('admin/cars')->with('message','You can not skip the price Please Try Again');
        }
        $existId = Sale::where('car_id',$request['id'])->exists();
        if($existId) {
            return redirect('admin/cars')->with('message','You already Created the record');
        }
        $inputs = [];
        $inputs['car_id'] = $request['id'];
        $inputs['price'] = $request['price'];
        Sale::insert($inputs);
        return redirect('admin/car_sells')->with('message' , 'You successfully created It');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
