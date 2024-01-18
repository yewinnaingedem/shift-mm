<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TvFiexer; 
use Carbon\Carbon ;
use App\Models\Car\Car ;
use Illuminate\Support\Facades\Validator;

class TVController extends Controller
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
                'tvDemage' => 'required' ,
                'code_id' => 'required|unique:tv_fiexers'
            ]
        );
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors() ,
            ] , 500  );
        }

        $tvDemages = [] ;
        $tvDemages['fixer_id'] = $request->fixer_id ;
        $tvDemages['car_id'] = $request->car_id ;
        $tvDemages['description'] = $request->tvDemage ; 
        $data = TvFiexer::leftJoin('cars', 'tv_fiexers.car_id', '=', 'cars.id')
                        ->leftJoin('exceptions', 'cars.exception_id', '=', 'exceptions.id')
                        ->where('cars.id','=' , $request->car_id)
                        ->update([
                            'tv' => $request['tvDemage'] ,
                        ]);
        $code_id = str_replace(" "  , '%' , $request->code_id);
        $tvDemages['code_id'] = $code_id ;
        $tvDemages['created_at'] = Carbon::now();
        TvFiexer::insert($tvDemages);
        return response()->json([
            'message' => 'You added successfully for TV Fixer' ,
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
        $check = TvFiexer::where('code_id' , $codeId)->update([
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
        $main = $paintDamage = TvFiexer::where('code_id', $codeId)->first();
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
}
