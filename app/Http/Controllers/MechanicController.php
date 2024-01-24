<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\machine ;
use Illuminate\Support\Facades\Validator;
use App\Models\Sepcialize ;
use Carbon\Carbon ;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = machine::select('machines.*' , 'sepcializes.category')
                    ->LeftJoin('sepcializes','machines.specialize' , 'sepcializes.id')
                    ->get() ;
        return view('Admin.POS.Mechanic.index' ,compact("machines"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sepcializes = Sepcialize::get();
        return view('Admin.POS.Mechanic.create' , compact('sepcializes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'name' => 'required|unique:machines' ,
                'phoneNumber' => ['required', 'numeric', 'min:9'] ,
                'sepcialize' => 'required'
            ]
        );
        
        if ($validator->fails()) {
            return redirect('admin/mechanic/create')
                ->withErrors($validator)
                ->withInput();
        }
        $machines = [] ;
        $machines['name'] = $request['name'];
        $machines['phone'] = $request['phoneNumber'];
        $machines['specialize'] = $request['sepcialize'];
        $machines['created_at'] = Carbon::today() ;
        machine::create($machines);
        return redirect('admin/mechanic')->with('message' , 'You created the mechanic Field Successfully');
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
