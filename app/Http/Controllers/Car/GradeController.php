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
use App\Models\Function_Name ;
use App\Models\SunRoof ;
use App\Models\Brand ;
use App\Models\Sonor ;
use App\Models\CarDetails ;
use App\Models\Aircon ;
use App\Models\Camera ;
use App\Models\Cylinder ;
use App\Models\Engine_type ;
use App\Models\Motor ;
use App\Models\Transmission ;
use App\Models\BodyStyle ;
use App\Models\Car\CarFunction ;
use App\Models\Default_function ;
use App\Models\EnginePower ;
use App\Models\CarFucture ;
use App\Models\Divertrim ;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $grades = Grade::select('car_models.model_name','grades.grade'  , 'grades.id' , 'grades.created_at', 'brands.brand_name')
                    ->leftJoin('car_models' , 'grades.carModel_id' , 'car_models.id')
                    ->leftJoin('brands' , 'car_models.brand_id' , 'brands.id' )
                    ->get();
        return view('admin.POS.Grade.index' , compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = CarModel::get();
        $brands = Brand::get();
        return view('admin.POS.Grade.create' , compact('models' , 'brands'));
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
        $grade = $request['grade'] ? $request['grade'] : 'none' ;
        $carExist = Grade::where('carModel_id' , $request->model)
                                ->where('grade' , $grade )
                                ->exists() ;
        if($carExist) {
            $validator->errors()->add('grade', 'it is already taken');
            return redirect('admin/grade/create')->withErrors($validator)->withInput();
        }
        if($validator->fails()) {
            return redirect('admin/grade/create')->withErrors($validator)->withInput();
        }
        $model_id = $request['model'] ;
        $inputs = [] ;
        $inputs['carModel_id'] = $model_id ;
        $inputs['grade'] = $request['grade'] ? $request['grade'] : false ;
        $inputs['created_at'] = Carbon::now();
        $datas = [] ;
        $datas['functions'] = CarDetails::get();
        $datas['transmissions'] = Transmission::get();
        $brand = Brand::where('id' , $request->brand)->first();
        $model = CarModel::where('id' , $request->model)->first();
        $datas['brand_name']  = $brand->brand_name;
        $datas['model_name'] = $model->model_name ;
        $datas['body_styles'] = BodyStyle::get(); 
        $datas['cylinders'] =  Cylinder::get();
        $datas['fuels'] =  Engine_type::get();
        $datas['seats'] = Seat::get();
        $datas['keys']= Key::get();
        $datas['divertrims'] = Divertrim::get();
        $datas['sun_roofs'] = SunRoof::get();
        $datas['aircons'] = Aircon::get();
        $datas['sonars'] = Sonor::get();
        $datas['motors'] = Motor::get();
        $datas['defaultFunctions'] = Default_function::first() ;
        $datas['function_names'] = Function_Name::get();
        $datas['inputField'] = $inputs ;
        $datas['grade'] = $grade ;
        $datas['cameras'] = Camera::get();
        $modelX = [] ;
        if($request['modelX']['test'] == "TRUE"){
            $modelX['model'] = $request['modelX']['model'] ;
            $modelX['year'] = $request['modelX']['year'] ;
            $modelX['make'] = $request['modelX']['make'] ;
            $modelX['test'] = $request['modelX']['test'] ;
        }else {
            $modelX['test'] = $request['modelX']['test'] ;
        }
        $datas['modelX'] = $modelX ;
        $datas['modelX'] = $request['modelX'] ;
        return view('admin.POS.Grade.gradeForm',compact('datas'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datas = [] ;
        $datas['functions'] = CarDetails::get();
        $datas['transmissions'] = Transmission::get();
        $datas['body_styles'] = BodyStyle::get(); 
        $datas['cylinders'] =  Cylinder::get();
        $datas['fuels'] =  Engine_type::get();
        $datas['seats'] = Seat::get();
        $datas['keys']= Key::get();
        $datas['divertrims'] = Divertrim::get();
        $datas['sun_roofs'] = SunRoof::get();
        $datas['aircons'] = Aircon::get();
        $datas['sonars'] = Sonor::get();
        $datas['motors'] = Motor::get();
        $datas['defaultFunctions'] = Default_function::first() ;
        dd($datas['defaultFunctions']);
        $datas['function_names'] = Function_Name::get();
        $datas['engine_powers'] = EnginePower::get();
        return view('admin.POS.Grade.gradeForm',compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_id = CarFucture::select('grades.grade','aircons.id as aircon_id','engines.id as engine_id', 'seats.id as seat_id' , 'divertrims.id as divertrim_id' , 'sun_roofs.id as sun_roof_id' ,
                    'keys.id as key_id' , 'motors.id as motor_id' , 'transmissions.id as trasn_id' ,'sonors.id as sonar_id' , 'body_styles.id as body_id'
                    )
                    ->leftJoin('grades','car_fuctures.grade_id' , 'grades.id')
                    ->leftJoin('seats','car_fuctures.seat_id' , 'seats.id')
                    ->leftJoin('sun_roofs','car_fuctures.sun_roof_id' , 'sun_roofs.id')
                    ->leftJoin('motors','car_fuctures.motor_id','motors.id')
                    ->leftJoin('engines','car_fuctures.engine_id','engines.id')
                    ->leftJoin('keys' , 'car_fuctures.key_id','keys.id')
                    ->leftJoin('aircons','car_fuctures.aircon_id','aircons.id')
                    ->leftJoin('sonors' , 'car_fuctures.sonor_id' , 'sonors.id')
                    ->leftJoin('transmissions' , 'car_fuctures.transmission_id' , 'transmissions.id')
                    ->leftJoin('divertrims' , 'car_fuctures.divertrim_id' , 'divertrims.id')
                    ->leftJoin('body_styles' , 'car_fuctures.bodyStyle_id','body_styles.id')
                    ->where('car_fuctures.grade_id' , $id)
                    ->first();
        $blas = CarFunction::where('grade_id',$id)->get();
        $input['transmissions'] = Transmission::get();
        $input['body_styles'] = BodyStyle::get();
        $input['engines'] = Engine::get();
        $input['keys'] = Key::get();
        $input['divertrims'] = Divertrim::get();
        $input['sun_roofs'] = SunRoof::get();
        $input['aircons'] = Aircon::get();
        $input['sonars'] = Sonor::get();
        $input['seats'] = Seat::get();
        $input['motors'] = Motor::get();
        $input['functions'] = CarDetails::get();

        return view('admin.POS.Grade.update'  ,compact('data_id' , 'input' , 'blas' , 'id'));
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
        CarFucture::where('grade_id',$id)->delete();
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
        $inputs['engine_id'] = $request['engine'];
        $inputs['motor_id'] = $request['motor'] ;
        $inputs['transmission_id'] = $request['transmission'] ;
        $inputs['divertrim_id'] = $request['divertrim'] ;
        $inputs['bodyStyle_id'] = $request['body_style'] ;
        $existFunction = $request['functions'] ? true : false ;
        if($existFunction) {
            foreach ($request['functions'] as $key => $value) {
                CarFunction::insert([
                    'grade_id' => $inputs['grade_id'] ,
                    'car_detail_id' => $value
                ]);
            }
        }
        CarFucture::insert($inputs);
        return redirect('admin/grade')->with('message' , 'you created the grade successfully');

    }

    public function functionTesting(Request $request) {
        $validator = Validator::make(
            $request->all() ,
            [
                'transmission' => 'required' ,
                'body_style' => 'required' ,
                'engine' => 'required' ,
                'key' => 'required' ,
                'divertrim' => 'required' ,
                'sun_roof' => 'required' ,
                'aircon' => 'required' ,
                'sonar' => 'required' ,
                'seat' => 'required' ,
                'motor' => 'required' ,
            ]
        );
        if($validator->fails())
        {
            dd('hi');
            return  redirect()->back()->withErrors($validator)->withInput();
        }
        $id = $request['id'] ;
        $inputs = [];
        $inputs['seat_id'] = $request['seat'] ;
        $inputs['sun_roof_id'] = $request['sun_roof'];
        $inputs['sonor_id'] = $request['sonar'];
        $inputs['key_id'] = $request['key'] ;
        $inputs['aircon_id'] = $request['aircon'] ;
        $inputs['engine_id'] = $request['engine'];
        $inputs['motor_id'] = $request['motor'] ;
        $inputs['transmission_id'] = $request['transmission'] ;
        $inputs['divertrim_id'] = $request['divertrim'] ;
        $inputs['bodyStyle_id'] = $request['body_style'] ;
        $input['updated_at'] = Carbon::now();
        CarFucture::where('grade_id' , $id)->update($inputs);
        $existFunction = $request['functions'] ? true : false ;
        if($existFunction) {
            $valid = $this->updateFucture($request['functions'] , $id);
        }
        return redirect('admin/grade')->with('message' , 'you updated the record succesfully');

    }

    public function updateFucture( array $value  ,  $id  ) {
        $existId = CarFunction::where('grade_id' , $id)->exists();
        if($existId) {
            CarFunction::where('grade_id' , $id)->delete();
        }
        foreach ($value  as $update ) {
            CarFunction::insert([
                'grade_id' => $id ,
                'car_detail_id' => $update 
            ]);
        }
        return true ;
    }
}
