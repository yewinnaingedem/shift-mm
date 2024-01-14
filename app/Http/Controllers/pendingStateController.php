<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\machine ;
use App\Models\PaintDemage ;
use App\Models\Panding ;
use App\Models\Sepcialize ;
class pendingStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Panding::select('brands.brand_name','car_models.model_name','years.year','owner_books.license_plate','grades.grade' , 'pandings.car_id')
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
        $panding = [];
        $panding['demage']  = Panding::select('exceptions.*', 'cars.id as car_id' ,)
                        ->leftJoin('cars' , 'pandings.car_id','cars.id')
                        ->leftJoin('exceptions','cars.exception_id','exceptions.id')
                        ->where('pandings.car_id','=',$id)
                        ->first();
        $panding['fixers'] = machine::get() ;
        $panding['paintDemage'] = PaintDemage::get();
        $panding['sepcializes'] = Sepcialize::get() ;
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
}
