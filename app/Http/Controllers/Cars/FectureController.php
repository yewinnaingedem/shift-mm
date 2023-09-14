<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fecture ;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon ;

class FectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Cars.Fecture.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Cars.Fecture.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all() ,
            [
                'interior_color' => "string|required" ,
                'vin' => 'required' ,
                'transmission' => 'required' ,
            ]
        );
        // if($validation->fails()) {
        //     return redirect('admin/fecuters/create')->withErrors($validation)->withInput();
        // }
        $curise_control = $request['curise_control'] ? true : false ; 
        $lane_depurature = $request['lane_depurature'] ? true : false ;
        $streeing_volue = $request['streeing_volue'] ? true : false ;
        $ac = $request['ac'] ? $request['ac'] : 'manual' ;
        $rounded_ac = $request['rounded_ac'] ? $request['rounded_ac'] : false ;
        $keys = $request['keys'] ;
        $sun_roof = $request->sunroof ? $request->sunroof : false ;
        $vin = $request['vin'] ;
        $transmission = $request['transmission'] ? $request->transmission : 'auto'  ;
        $wheel = $request['wheel'] ? $request['wheel'] : '2wheels' ;
        $auto_headlight = $request['auto_headlight'] ? true : false ;
        $rain_sensor = $request['rain_sensor'] ? true : false ;
        $blind_sport = $request['blind_sport'] ? true : false ;
        $auto_em_b = $request['auto_em_b'] ? true : false ;
        $abs = $request['abs'] ? true : true  ;
        $auto_hold = $request['auto_hold'] ? true : false ;
        $tire_pressure = $request['tire_pressure'] ? true : false ;
        $camera_360 = $request['360_camera'] ? true : 'back_camera' ;
        $truck_motor = $request['truck_motor'] ? true : false ;
        $kick_sensor = $request['kick_sensor'] ? true : false ;
        $sonor = $request['sonor'] ? $request['sonor'] : false ;
        $type = $request['type'] ? $request['type'] : null ;
        $interior_color = $request['interior_color'] ? $request['interior_color'] : null ;
        $seats = $request['seats'] ? $request['seats'] : "2rows" ;

        $inputs = [] ;
        $inputs['curise_control'] = $curise_control ;
        $inputs['lane_depurature'] = $lane_depurature ;
        $inputs['streeing_volue'] = $streeing_volue ;
        $inputs['ac'] = $ac ;
        $inputs['rounded_ac'] = $rounded_ac ;
        $inputs['key'] = $key ;
        $inputs['sun_roof'] = $sun_roof ;
        $inputs['transmission'] = $transmission ;
        $inputs['VIN'] = $vin ;
        $inputs['wheel'] = $wheel ;
        $inputs['auto_headlight'] = $auto_headlight ;
        $inputs['rain_sensor'] = $rain_sensor ;
        $inputs['blind_sport'] = $blind_sport ; 
        $inputs['auto_em_b'] = $auto_em_b ;
        $inputs['abs'] = $abs ;
        $inputs['auto_hold'] = $auto_hold ;
        $inputs['tire_pressure'] = $tire_pressure ;
        $inputs['360_camera'] = $camera_360 ;
        $inputs['truck_motor'] = $truck_motor ;
        $inputs['kick_sensor'] = $kick_sensor ;
        $inputs['sonor'] = $sonor ;
        $inputs['type'] = $type ;
        $inputs['interior_color'] = $interior_color ;
        $inputs['seates'] = $seats ;

        dd($inputs);
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
