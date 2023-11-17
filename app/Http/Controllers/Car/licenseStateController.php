<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicenseState ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class licenseStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licenseStates = LicenseState::get();
        return view('Admin.POS.License-State.index',compact('licenseStates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.POS.license-state.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'state' => 'required|unique:license_states,state',
            ]
        );
        if($validator->fails()) {
            return redirect('admin/license-state/create')->withErrors($validator)->withInput();
        }
        $inputs = [] ;
        $inputs['state'] = $request['state'];
        $inputs['created_at'] = Carbon::now() ;
        LicenseState::insert($inputs);
        return redirect('admin/license-state')->with('message','You created the Licese State Successfully');
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
        $validator = Validator::make(
            $request->all() ,
            [
                'state' => [
                    'required' ,
                    Rule::unique('license_states')->ignore($id),
                ]
            ]
        );
        if($validator->fails()) {
            return response()->json([
                'message' => "sorry" ,
                'state_code' => "304" 
            ]);
        }
        $inputs = [] ;
        $inputs['state'] = $request['state'] ;
        $inputs['updated_at'] = Carbon::now();
        LicenseState::where('id',$id)->update($inputs);
        return response()->json('you have reached');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LicenseState::find($id)->delete();
        return response()->json('You deleted it');
    }
}
