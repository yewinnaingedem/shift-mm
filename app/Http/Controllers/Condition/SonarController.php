<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sonor ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SonarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sonars = Sonor::get();
        return view('admin.POS.Condition.Sonar.index',compact('sonars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.POS.Condition.Sonar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'sonar' => [
                    'required' ,
                    Rule::unique('sonors')->where(function ($query){
                        return $query->where('sonar',request('sonar'));
                    }),
                ],
            ]
        );
        if($validator->fails())
        {
            return redirect('admin/sonar/create')->withErrors($validator)->withInput();
        }
        $sonars = [] ;
        $sonars['sonar'] = $request['sonar'];
        $sonars['created_at'] = Carbon::now();

        Sonor::insert($sonars);
        return redirect('admin/sonar')->with('message','You created the sonar succesfully');
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
        $sonar = Sonor::where('id',$id)->first();
        return view('admin.POS.Condition.Sonar.update',compact('sonar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator= Validator::make(
            $request->all() ,
            [
                'sonar' => [
                    'required' ,
                    Rule::unique('sonors')->where(function ($query){
                        return $query->where('sonar',request('sonar'));
                    })->ignore($id),
                ],
            ]
        );
        if($validator->fails())
        {
            return redirect('admin/sonar/'.$id.'/edit')->withErrors($validator)->withInput();
        }
        $updatedDatas = [];
        $updatedDatas['sonar'] = $request['sonar'];
        $updatedDatas['updated_at'] = Carbon::now() ;
        Sonor::where('id',$id)->update($updatedDatas);
        return redirect('admin/sonar')->with('message','You updated the record successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sonor::find($id)->delete();
        return response()->json('You deleted the record successfully');
    }
}
