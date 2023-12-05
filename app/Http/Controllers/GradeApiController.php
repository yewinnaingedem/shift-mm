<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarFucture; 
use App\Models\Default_function; 
use App\Models\Car\CarFunction ;
use App\Models\Engine ;
use App\Models\Grade ;
use Carbon\Carbon ;
use App\Models\CarModel ;
use Illuminate\Support\Arr;

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
        $grade = $request['gread'];
        $modelX = $request['modelX'];

        
        // for grade 
        $grades = [] ;
        $grades['carModel_id'] = $grade['carModel_id'];
        // for default Functions 
        $default_functionSet = [] ;
        $now = Carbon::now();
        $defaultFunId = 1 ;
        if($step3['advance']['exist'] == 'true' ) {
            $default_functionSet['air_conditioning'] = $step3['advance']['air_conditioning'] ;
            $default_functionSet['power_steering'] = $step3['advance']['power_steering'] ;
            $default_functionSet['power_windows'] = $step3['advance']['power_windows'] ;
            $default_functionSet['abs_brakes'] = $step3['advance']['abs_brakes'] ;
            $default_functionSet['airbags'] = $step3['advance']['airbags'] ;
            $default_functionSet['navigation_system'] = $step3['advance']['navigation_system'] ;
            $default_functionSet['bluetooth_connectivity'] = $step3['advance']['bluetooth_connectivity'] ;
            $defaultFunId = Default_function::insertGetId($default_functionSet);
        }
        $grades['default_function_id'] = $defaultFunId ;
        $grades['grade'] = $grade['grade'] == 'false' ? "none" : $grade['grade'];
        $grade['created_at'] = $now->day."/".$now->month."/".$now->year ;
        $gradeId = Grade::insertGetId($grades);
        // for car fuctures 
        $car_fuctures = [] ;
        $car_fuctures['grade_id'] = $gradeId ;
        $car_fuctures['seat_id'] = $step2['seat'] ;
        $car_fuctures['sun_roof_id'] = $step2['sun_roof'] ;
        $car_fuctures['sonor_id'] = $step2['sonor'] ;
        $car_fuctures['key_id'] = $step2['key'] ;
        $car_fuctures['aircon_id'] = $step2['aircon'] ;
        $car_fuctures['motor_id'] = $step2['motor'] ;
        $car_fuctures['camera_id'] = $step2['camera'];
        $car_fuctures['transmission_id'] = $step1['transmission'] ;
        $car_fuctures['divertrim_id'] = $step2['divertrim'] ;
        $car_fuctures['bodyStyle_id'] = $step1['body_style'] ;
        
        $engines = [] ;
        $engines['Engine_power_id'] = $step1['engine']['engine_power'];
        $engines['Cylinder_id'] = $step1['engine']['cylinder'];
        $engines['Fuel'] = $step1['engine']['fuel_type'];
        $engines['Turbo'] = $step1['engine']['turbo'] == "false" ? FALSE : TRUE;

        $car_fuctures['engine_id'] = Engine::insertGetId($engines);
        $existFunction = Arr::has($step3, 'functions');
        if($existFunction) {
            if(count($step3['functions']) !== 0) {
                foreach ($step3['functions'] as $key => $value) {
                    CarFunction::insert([
                        'grade_id' =>  $gradeId,
                        'car_detail_id' => $value
                    ]);
                }
            }
        }
        if($modelX['test'] == "TRUE") {
            $model = CarModel::where('id',$modelX['model'])->first();
            return response()->json([
                'message' => "You success" ,
                'redirect' => '/admin/car/'. $modelX['year'] . '/' . $modelX['make'] . '/' . $model->model_name ,
            ]);
        }
        CarFucture::insert($car_fuctures);
        return response()->json([
            'message' => "You success" ,
            'redirect' => '/admin/grade'
        ]);
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

    public function apiRoute($dataId) {
        $data = Default_function::where('id',$dataId)->first();
        return response()->json($data);
    }
}
