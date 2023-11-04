<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HpPlan;
use Illuminate\Support\Facades\Validator;

class SoldOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required' ,
            ]
        );
        if($validator->fails()) 
        {
            return redirect('admin/car_sells')->withErrors($validator)->withInput();
        }
        $soldOuts = [] ;
        $soldOuts['buyer'] = $request['name'];

        dd($soldOuts);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hps = HpPlan::get();
        return view('admin.POS.Car.SoldOut.index')->with('id',$id)->with('hps',$hps);
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
