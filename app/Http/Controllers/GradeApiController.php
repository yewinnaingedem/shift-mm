<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advance_functions; 
use App\Models\Default_function; 
use App\Models\Car\CarFunction ;
use App\Models\Engine ;
use App\Models\Grade ;
use Carbon\Carbon ;
use App\Models\EnginePower ;
use App\Models\CarModel ;
use Illuminate\Support\Arr;

class GradeApiController extends Controller
{
    
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
        $validation = $request['validation'];
        // for grade 
        $grades = [] ;
        $engines = [] ;
        $grades['carModel_id'] = $grade['carModel_id'];
        // for engine
        $engines['Cylinder_id'] = $step1['engine']['cylinder'];
        $engines['Fuel'] = $step1['engine']['fuel_type'];
        $engines['Turbo'] = $step1['engine']['turbo'] == "false" ? FALSE : TRUE;
        # add engine power 
        $defaultEngine = $step1['engineSetup'];
        if (!$defaultEngine) {
            $enginePower = $step1['engine']['engine_power'] ;
            $engineExisted = EnginePower::where('id' , $enginePower)->exists();
            $enginePowerId;
            if(!$engineExisted) {
                $returnId = EnginePower::insertGetId([
                    'engine_power' => $enginePower ,
                    'created_at' => Carbon::now() ,
                ]);
                $enginePowerId = $returnId ;
            }else {
                $enginePowerId = $enginePower ;
            }
            
            $engines['engine_power_id'] =  $enginePowerId ;
            $grades['engine_id'] = Engine::insertGetId($engines);
        }else {
            $grades['engine_id'] = $defaultEngine ;
        }
       
        /* for default Functions 
            this is so funny
        */
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
        
        // for car fuctures 
        $advan_function = [] ;
        
        $advan_function['seat_id'] = $step2['seat'] ;
        $advan_function['sun_roof_id'] = $step2['sun_roof'] ;
        $advan_function['sonor_id'] = $step2['sonor'] ;
        $advan_function['key_id'] = $step2['key'] ;
        $advan_function['aircon_id'] = $step2['aircon'] ;
        $advan_function['motor_id'] = $step2['motor'] ;
        $advan_function['camera_id'] = $step2['camera'];
        $advan_function['transmission_id'] = $step1['transmission'] ;
        $advan_function['divertrim_id'] = $step2['divertrim'] ;
        $advan_function['created_at'] = Carbon::now();
        // get id column from advanc_function table 
        $advance_function_id = Advance_functions::insertGetId($advan_function);
        $grades['advance_function_id']  = $advance_function_id ;
        $grades['created_at'] = Carbon::now();
        $gradeId = Grade::insertGetId($grades);
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
        if($validation != "false") {
            $year = substr($validation, strpos($validation, "/") + 1);
            $model_name = substr($validation, 0, strpos($validation, "/"));
            $model = CarModel::select('car_models.model_name as model','brands.brand_name as brand')
                            ->leftJoin('brands','car_models.brand_id','brands.id')
                            ->where('model_name',$model_name)
                            ->first();
            return response()->json([
                'message' => "You success" ,
                'redirect' => '/admin/car/'. $model->brand . '/' . $model->model . '/' . $year  ,
            ]);
        }
        
        // get id form advance_functions
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
        $responseData = \Illuminate\Support\Arr::except($data, ['id']);
        return response()->json($responseData);
    }

    public function turboLoad($id) {
        $grade = Engine::where('id' , $id)->first();
        return response()->json($grade , 200);
    }
}
