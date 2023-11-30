<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarDetails ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;

class FunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $functions = CarDetails::get();
        return view('admin.POS.Function.index' , compact('functions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.POS.Function.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'function' => 'required|unique:car_details'
            ]
        );
        if($validator->fails()){
            return redirect('admin/function/create')->withErrors($validator)->withInput();
        }
        $inputs = [] ;
        $inputs['function'] = $request['function'];
        $inputs['created_at'] = Carbon::now();
        CarDetails::insert($inputs);
        
        return redirect('admin/function')->with('message','You created the Function successfully');
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
        
        $detials = CarDetails::where('id',$id)->first();
        return view('admin.POS.Function.Update')->with('details' , $detials)->with('id' , $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make(
            $request->all() ,
            [
                'function' => 'required|unique:car_details,function,'.$id ,
            ]
        );
        if($validator->fails()) {
            return redirect('admin/function/'.$id.'/edit')->withErrors($validator)->withInput();
        }
        $time = Carbon::now();
        $timeString = $time->format('d/m/Y');
        $updated = [] ;
        $updated['function'] = $request->function ;
        $time = \Carbon\Carbon::createFromFormat('d/m/Y', $timeString);
        $updated['updated_at'] = $time;
        CarDetails::where('id',$id)->update($updated);
        return redirect('admin/function')->with('message','You successfully updated the function row');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existId  = session()->has('id') ? session()->get('id') : '' ;
        if($existId == $id) {
            return response('you already deleted it');
        }
        CarDetails::find($id)->delete();
        session()->put('id' , $id);
        return response('you deleted the record');
    }
}
