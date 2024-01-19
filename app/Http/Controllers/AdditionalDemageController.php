<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdditionalDemage; 
use Carbon\Carbon ;
use App\Models\Car\Car ;
use Illuminate\Support\Facades\Validator;

class AdditionalDemageController extends Controller
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
                'additionalDemage' => 'required' ,
                'code_id' => 'required|unique:additional_demages'
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
        $paintDemage['description'] = $request->additionalDemage ;
        
        $code_id = str_replace(" "  , '%' , $request->code_id);
        $paintDemage['code_id'] = $code_id ;
        $paintDemage['created_at'] = Carbon::now();
        AdditionalDemage::insert($paintDemage);
        $data = AdditionalDemage::leftJoin('cars', 'additional_demages.car_id', '=', 'cars.id')
            ->leftJoin('exceptions', 'cars.exception_id', '=', 'exceptions.id')
            ->where('additional_demages.car_id', $request->car_id)
            ->update(['exceptions.addition_exception' => $request->additionalDemage]);
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
        $codeId = str_replace(' ', '%' , $id);
        $check = AdditionalDemage::where('code_id' , $codeId)->update([
            'state' => 1 ,
            'updated_at' => Carbon::now()
        ]);
        return response()->json([
            'success' => "It already done" ,
        ] , 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkApi(Request $request) {
        $codeId = str_replace(' '  , "%" , $request->codeId);
        $main = AdditionalDemage::where('code_id', $codeId)->first();
        $check = $main ?  TRUE : FALSE ;
        if($check) {
            $timeSinceCreation = Carbon::parse($main->created_at)->diffForHumans();
            return response()->json([
                'success' => $check ,
                'state' => $main->state ,
                'timeSinceCreated' => $timeSinceCreation ,
            ] , 200);
        }else {
            return response()->json([
                'success' => $check ,
                'state' => 0 ,
                'timeSinceCreated' => null ,
            ] , 200);
        }
        
    }

    public function putDemage (Request $request  , $codeId) {
        $code_id = str_replace(' ','%' , $codeId);
    }
}
