<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Car ;
use Illuminate\Support\Facades\Validator;
use App\Models\Car\Sale ;
use App\Models\Before_Sale ;
use App\Models\Car\Item ;
use Carbon\Carbon ;

class CarSellController extends Controller
{
    
    public function index()
    {
        $sales = Sale::select('car_models.model_name','brands.brand_name','license_states.state as license_state','owner_books.license_plate','grades.grade','sales.id','sales.price' , 'cars.id as main_id','company_infos.industry_name as company_name','sales.sale_date')
                    ->leftJoin('automobile_sales','sales.automobile_sale_id','automobile_sales.id')
                    ->leftJoin('cars','automobile_sales.car_id','cars.id')
                    ->leftJoin('company_infos','automobile_sales.company_id','company_infos.id')
                    ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                    ->leftJoin('license_states','owner_books.license_state','license_states.id')
                    ->leftJoin('items','cars.item_id','items.id')
                    ->leftJoin('car_models','owner_books.model_id','car_models.id')
                    ->leftJoin('brands','car_models.brand_id','brands.id')
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
            return redirect('admin/before_sale')->with('message','You can not skip the price Please Try Again');
        }
        $existId = Sale::where('automobile_sale_id',$request['id'])->exists();
        if($existId) {
            return redirect('admin/before_sale')->with('message','You already Created the record');
        }
        $cleanedValue = str_replace(',', '', $request['price']);
        $inputs = [];
        $inputs['automobile_sale_id'] = $request['id'];
        $inputs['price'] = $cleanedValue;
        $inputs['sale_date'] = Carbon::today();
        $inputs['bestSeller'] = true ;
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'pirce' => 'required' ,
            ]
        );
        if($validator->fails()){
            return response()->json([
                'errror' => $validator->errors()
            ]);
        }
        $today = Carbon::today(); 
        $inputs = [] ;
        $inputs['price'] = $request['pirce'];
        Sale::where('automobile_sale_id',$id)->update($inputs);
        return response()->json([
            'message' => true ,
        ]);
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
