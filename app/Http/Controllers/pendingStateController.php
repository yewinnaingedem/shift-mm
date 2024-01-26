<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\machine ;
use App\Models\PaintDemage ;
use App\Models\Panding ;
use Carbon\Carbon ;
use App\Models\Before_Sale ;
use App\Models\Sepcialize ;
class pendingStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Panding::select('brands.brand_name','car_models.model_name','years.year','owner_books.license_plate','grades.grade' , 'pandings.car_id', 'pandings.state')
                    ->leftJoin('cars' , 'pandings.car_id','cars.id')
                    ->leftJoin('owner_books' , 'cars.owner_book_id' , 'owner_books.id')
                    ->leftJoin('car_models','owner_books.model_id','car_models.id')
                    ->leftJoin('brands','car_models.brand_id','brands.id')
                    ->leftJoin('years','owner_books.year_id','years.id')
                    ->leftJoin('items','cars.item_id','items.id')
                    ->leftJoin('grades','items.grade','grades.id')
                    ->get();
        
        return view('Admin.PendingState.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function fixedPanding(Request $request) {
        Panding::where('car_id',$request->carId)->update([
            'state' => 1 ,
        ]);
        return response()->json([
            'message' => "OK"
        ], 200) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json([
            'data' => $request->all() ,
        ], 200) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $panding = [];
        $panding['demage']  = Panding::select('exceptions.*', 'cars.id as car_id','owner_books.license_plate')
                        ->leftJoin('cars' , 'pandings.car_id','cars.id')
                        ->leftJoin('owner_books','cars.owner_book_id' , "owner_books.id")
                        ->leftJoin('exceptions','cars.exception_id','exceptions.id')
                        ->where('pandings.car_id','=',$id)
                        ->first();
        $panding['fixers'] = machine::get() ;
        $panding['paintDemage'] = PaintDemage::get();
        $panding['sepcializes'] = Sepcialize::get() ;
        $panding['car_id'] = $id ;
        return view('Admin.PendingState.create', compact('panding'));
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

    public function moveToNextStep ($carId) {
        $beforeStates = [] ;
        $exist = Before_Sale::where('car_item' , $carId)->exists() ;
        if(!$exist) {
            $beforeStates['car_item'] = $carId ;
            $beforeStates['created_at'] = Carbon::now() ;
            Before_Sale::create($beforeStates);
            Panding::where('car_id', $carId)->delete();
            return response()->json([
                'message' => 'You created Successfully' ,
                'redirectRoute' => "http://localhost:8000/admin/before_sale" ,
            ] , 200);
        }
        return response()->json([
            'message' => 'You already Created For this car !!' ,
            'redirectRoute' => "http://localhost:8000/admin/before_sale" ,
        ] , 200);
        
        
    }
}
