<?php

namespace App\Http\Controllers\Engine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;
use App\Models\Engine ;
use App\Models\EnginePower ;
use App\Models\Cylinder ;
use App\Models\Engine_type ;
use App\Http\Requests\EngineValidationRequest ;

class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $engines = Engine::select('engines.Engine_power_id','engine.engine_power as engine_power' , 'engines.created_at' , 'engines.id' , 'engines.Turbo' , 'cylinders.cylinder' , 'engine_types.type')
                    ->leftJoin('engine_types' , 'engines.Fuel' , 'engine_types.id')
                    ->leftJoin('engine_powers as engine','engines.Engine_power_id','engine.id')
                    ->leftJoin('cylinders','engines.Cylinder_id' , 'cylinders.id')
                    ->get();
        return view('admin.POS.AboutEngine.Engine.index',compact('engines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cylinders = Cylinder::get();
        $fuels = Engine_type::get();
        return view('admin.POS.AboutEngine.Engine.create' , compact('cylinders' , 'fuels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'Engine_power' => 'required' ,
                'Fuel' => 'required' ,
            ]
        );
        if($validator->fails())
         {
            return redirect('admin/engine/create')->withErrors($validator)->withInput();
         }
        $turbo = $request['Turbo'] ? true : false ;
        $inputs = [] ;
        $inputs['Engine_power_id'] = EnginePower::insertGetId([
            'engine_power' => $request['Engine_power'] ,
            'created_at'   => Carbon::now() ,
        ]) ;
        $inputs['Fuel'] = $request['Fuel'] ;
        $inputs['Cylinder_id'] = $request['Cylinder'];
        $inputs['Turbo'] = $turbo ;
        $inputs['created_at'] = Carbon::now();

        Engine::insert($inputs);
        return redirect('admin/engine')->with('message','You created the Engine Successfully');
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
        $engine = Engine::where('id' , $id)->first() ;
        $engine['cylinders'] = Cylinder::get();
        $engine['engine_types'] = Engine_type::get();
        return view('admin.POS.AboutEngine.Engine.update',compact('engine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'Engine_power' => 'required' ,
                'Fuel' => 'required' ,
                'Cylinder' => 'required'
            ]
        );
        if($validator->fails())
        {
            return redirect('admin/engine/'.$id.'/edit')->withErrors($validator)->withInput();
        }
        $updatedDatas = [] ;
        $updatedDatas['Engine_power'] = $request['Engine_power'] ;
        $updatedDatas['Fuel'] = $request['Fuel'] ;
        $updatedDatas['Cylinder_id'] = $request['Cylinder'] ;
        $updatedDatas['Turbo'] = $request['Turbo'] ? true : false ;
        $updatedDatas['updated_at'] = Carbon::now();
        Engine::where('id',$id)->update($updatedDatas);
        return redirect('admin/engine')->with('message','You updated the Engine Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Engine::find($id)->delete();
        return response()->json('You delete the Engine Successfully');
    }
}
