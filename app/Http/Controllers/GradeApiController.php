<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarFucture; 

class GradeApiController extends Controller
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
        $step1 = $request['vue1'];
        $step2 = $request['vue2'];
        $step3 = $request['vue3'];

        $car_fuctures = [] ;
        // $car_fuctures['grade_id'] = $step1 ;
        $car_fuctures['seat_id'] = $step2['seat'] ;
        // return response()->json($car_fuctures);
        $car_fuctures['sun_roof_id'] = $step2['sun_roof'] ;
        // $car_fuctures['sonor_id'] = $step2->  sonor 
        $car_fuctures['key_id'] = $step2['key'] ;
        $car_fuctures['aircon_id'] = $step2['aircon'] ;
        $car_fuctures['motor_id'] = $step2['motor'] ;
        $car_fuctures['transmission_id'] = $step1['transmission'] ;
        $car_fuctures['divertrim_id'] = $step2['divertrim'] ;
        $car_fuctures['bodyStyle_id'] = $step1['body_style'] ;
        
        $engines = [] ;
        $engines['Engine_power'] = $step1['engine']['engine_power'];
        $engines['Cylinder_id'] = $step1['engine']['cylinder'];
        $engines['Fuel'] = $step1['engine']['fuel_type'];
        $engines['Turbo'] = $step1['engine']['turbo'];
        // return response()->json($engines);
        // $car_fuctures['engine_id'] = Engine::insertGetId($engines);
        // if(count($step3['functions']) == 0) {
        //     foreach ($step3->functions as $key => $value) {
        //         CarFunction::insert([
        //             'grade_id' => $inputs['grade_id'] ,
        //             'car_detail_id' => $value
        //         ]);
        //     }
            // return response()->json(true);
        // }
        $default_functionSet = [] ;
        if($step3['advance']['exist'] == true ) {
            $default_functionSet['function_name'] = null ;
            $default_functionSet['air_conditioning'] = $step3['advance']['air_conditioning'] ;
            $default_functionSet['power_steering'] = $step3['advance']['power_steering'] ;
            $default_functionSet['power_windows'] = $step3['advance']['power_windows'] ;
            $default_functionSet['abs_brakes'] = $step3['advance']['abs_brakes'] ;
            $default_functionSet['airbags'] = $step3['advance']['airbags'] ;
            $default_functionSet['airbags'] = $step3['advance']['airbags'] ;
            $default_functionSet['airbags'] = $step3['advance']['airbags'] ;

            return response()->json($default_functionSet);
        }else {
            return response()->json('Hi');
        }


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
