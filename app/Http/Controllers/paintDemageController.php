<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaintDemage; 
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;

class paintDemageController extends Controller
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
        $validator = Validator::make(
            $request->all() ,
            [
                'fixer_id' => 'required' ,
                'car_id' => 'required' ,
                'description' => 'required' ,
                'code_id' => 'required'
            ]
        );
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors() ,
            ] , 500  );
        }

        $paintDemage = [] ;
        $paintDemage['fixer_id'] = $request->fixer_id ;
        $paintDemage['car_id'] = $request->car_id ;
        $paintDemage['description'] = $request->description ;
        $paintDemage['code_id'] = $request->code_id ;
        $paintDemage['created_at'] = Carbon::today();
        PaintDemage::insert($paintDemage);
        return response()->json([
            'message' => 'You added successfully' ,
        ] , 200) ;
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
