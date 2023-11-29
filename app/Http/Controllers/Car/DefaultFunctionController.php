<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Default_function ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;

class DefaultFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $defaultFunctions = Default_function::get() ;
        return view('Admin.POS.Function.Default.index',compact('defaultFunctions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.POS.Function.Default.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all() ,
            [
                'ac' => 'required' ,
                'power_steering' => 'required' ,
                'power_windows' => 'required' ,
                'airbags' => 'required' ,
                'navigation_system' => 'required' ,
                'abs_brakes' => 'required' ,
            ]
        );
        if($validation->fails()) {
            return redirect('admin/default-function/create')->withErrors($validation)->withInput() ;
        }
        $inputs  = [] ;
        $inputs['air_conditioning'] = $request['ac'] == "TRUE" ? true : false  ;
        $inputs['power_steering'] = $request['power_steering'] == "TRUE" ? true : false ;
        $inputs['power_windows'] = $request['power_windows'] == "TRUE" ? true : false ;
        $inputs['abs_brakes'] = $request['abs_brakes'] == "TRUE" ? true : false ;
        $inputs['airbags'] = $request['airbags'] == "TRUE" ? true : false ;
        $inputs['navigation_system'] = $request['navigation_system'] == "TRUE" ? true : false ;
        $inputs['bluetooth_connectivity'] = $request['bluetooth_connectivity'] == "TRUE" ? true : false ;
        $inputs['created_at'] = Carbon::now() ;
        Default_Function::insert($inputs) ;
        return redirect('admin/default-function')->with('message','You Creted the Default Function Successfully');
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
        $valiatedData = $request->validate([
            'function' => 'required|unique:default_functions,id,' . $id 
        ]);
        $inputs = [] ;
        $inputs['function_name'] = $request['function'] ;
        $inputs['updated_at'] = Carbon::now(); 

        Default_function::where('id',$id)->update($inputs);
        $response  = [
            'message' => " 1 row effected" ,
        ];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Default_Function::find($id)->delete();
        return response()->json('You deleted it successfully');
    }
}
