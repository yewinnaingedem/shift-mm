<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Grade ;
use App\Models\CarModel ;
use Carbon\Carbon;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::select('car_models.model_name','grades.grade' , 'grades.id' , 'grades.created_at')
                    ->leftJoin('car_models' , 'grades.carModel_id' , 'car_models.id')
                    ->get();
        return view('admin.POS.Grade.index' , compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = CarModel::get();
        return view('admin.POS.Grade.create' , compact('models'));
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

        if($validator->fails()) {
            return redirect('admin/grade/create')->withErrors($validator)->withInput();
        }

        $model_id = $request['model'] ;
        $inputs = [] ;
        $inputs['carModel_id'] = $model_id ;
        $inputs['grade'] = $request['grade'] ? $request['grade'] : false ;
        $inputs['created_at'] = Carbon::now();
        Grade::insert($inputs);
        return redirect('admin/grade')->with('message' , 'you creted the grade');
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
        Grade::find($id)->delete();
        return response()->json('You deleted the data scuccessfully');
    }
}
