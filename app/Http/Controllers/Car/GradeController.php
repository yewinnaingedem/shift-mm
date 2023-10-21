<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Grade ;
use App\Models\CarModel ;
use Carbon\Carbon;
use App\Models\Engine ;
use App\Models\Seat ;
use App\Models\Key ;
use App\Models\SunRoof ;
use App\Models\Sonor ;
use App\Models\CarDetails ;
use App\Models\Aircon ;
use App\Models\Motor ;
use App\Models\Transmission ;
use App\Models\BodyStyle ;
use App\Models\Car\CarFunction ;
use App\Models\CarFucture ;
use App\Models\Divertrim ;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::select('car_models.model_name','grades.grade' , 'grades.id' , 'grades.created_at')
                    ->leftJoin('car_models' , 'grades.carModel_id' , 'car_models.id')
                    ->get();
        return view('admin.POS.Grade.index' , compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = CarModel::get();
        return view('admin.POS.Grade.create' , compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'model' => 'required' ,
            ]
        );

        if($validator->fails()) {
            return redirect('admin/grade/create')->withErrors($validator)->withInput();
        }

        $model_id = $request['model'] ;
        $inputs = [] ;
        $inputs['carModel_id'] = $model_id ;
        $inputs['grade'] = $request['grade'] ? $request['grade'] : false ;
        $inputs['created_at'] = Carbon::now();
        $id = Grade::insertGetId($inputs);
        $functions = CarDetails::get();
        $transmissions = Transmission::get();
        $bodyStyles = BodyStyle::get();
        $engines = Engine::get();
        $seats = Seat::get();
        $keys = Key::get();
        $divertrims = Divertrim::get();
        $sun_roofs = SunRoof::get();
        $aircons = Aircon::get();
        $sonars = Sonor::get();
        $motors = Motor::get();
        return view('admin.POS.Grade.details' , compact('functions','motors' , 'id' ,'transmissions','bodyStyles','engines','keys' , 'divertrims','seats', 'sun_roofs','aircons' , 'sonars'));
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
        $datas = CarFucture::select('grades.grade' , 'seats.seat' , 'divertrims.divertrim' , 'sun_roofs.sun_roofs' ,
                    'keys.key' , 'motors.motor' , 'transmissions.transmission' ,'sonors.sonor' , 'body_styles.body_style'
                    )
                    ->leftJoin('grades','car_fuctures.grade_id' , 'grades.id')
                    ->leftJoin('car_functions','car_fuctures.function_id','car_functions.id')
                    ->leftJoin('seats','car_fuctures.seat_id' , 'seats.id')
                    ->leftJoin('sun_roofs','car_fuctures.sun_roof_id' , 'sun_roofs.id')
                    ->leftJoin('motors','car_fuctures.motor_id','motors.id')
                    ->leftJoin('keys' , 'car_fuctures.key_id','keys.id')
                    ->leftJoin('sonors' , 'car_fuctures.sonor_id' , 'sonors.id')
                    ->leftJoin('transmissions' , 'car_fuctures.transmission_id' , 'transmissions.id')
                    ->leftJoin('divertrims' , 'car_fuctures.divertrim_id' , 'divertrims.id')
                    ->leftJoin('body_styles' , 'car_fuctures.bodyStyle_id','body_styles.id')
                    ->where('car_fuctures.grade_id' , $id)
                    ->first();
        return view('admin.POS.Grade.update'  )->with('id' , $datas);
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
        Grade::find($id)->delete();
        return response()->json('You deleted the data scuccessfully');
    }

    public function gradeFunction(Request $request) {
        $validator = Validator::make(
            $request->all() ,
            [
                'id' => 'required' ,
                'motor' => 'required',
                'sonar' => 'required'
            ]
        );
        if($validator->fails())
        {
            return  redirect()->back()->withErrors($validator)->withInput();
        }
        $inputs=[];
        $inputs['grade_id'] = $request['id'] ;
        $inputs['seat_id'] = $request['seat'] ;
        $inputs['sun_roof_id'] = $request['sun_roof'];
        $inputs['sonor_id'] = $request['sonar'];
        $inputs['key_id'] = $request['key'] ;
        $inputs['aircon_id'] = $request['aircon'] ;
        $inputs['motor_id'] = $request['motor'] ;
        $inputs['transmission_id'] = $request['transmission'] ;
        $inputs['divertrim_id'] = $request['divertrim'] ;
        $inputs['bodyStyle_id'] = $request['body_style'] ;
        
        $function = [] ;
        $function['blind_sport'] = $request['Blind_Sport'] ? $request['Blind_Sport'] : false  ;
        $function['lane_keep_assit'] = $request['lane_keep_assit'] ? $request['lane_keep_assit'] : false ;
        $function['auto_headlight'] = $request['auto_headlight'] ? $request['auto_headlight'] : false ;
        $function['rain_sensor'] = $request['rain_sensor'] ? $request['rain_sensor'] : false ;
        $function['auto_hold'] = $request['auto_hold'] ? $request['auto_hold'] : false;
        $function['tire_pressure'] = $request['Tire_Pressure'] ? $request['Tire_Pressure'] : false;
        $function['kick_sensor'] = $request['kick_sensor'] ? $request['kick_sensor'] : false ;


        $function_Id = CarFunction::insertGetId($function);
        $inputs['function_id'] = $function_Id ;
        CarFucture::insert($inputs);
        return redirect('admin/grade')->with('message' , 'you created the grade successfully');

    }
}
