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
                'function' => 'required' ,
            ]
        );
        if($validation->fails()) {
            return redirect('admin/default-function/create')->withErrors($validation)->withInput() ;
        }
        $inputs  = [] ;
        $inputs['function_name'] = $request['function'] ;
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
            'function' => 'required'
        ]);
        $inputs = [] ;
        $inputs['function_name'] = $request['function'] ;
        $inputs['updated_at'] = Carbon::now(); 

        Default_function::where('id',$id)->update($inputs);
        return response()->json('successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
