<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SunRoof ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SunRoofController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sun_roofs = SunRoof::get();
        return view('admin.POS.Condition.Sun_Roof.index' , compact('sun_roofs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.POS.Condition.Sun_Roof.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator  = Validator::make(
            $request->all() ,
            [
                'sun_roof' => [
                    'required' ,
                    Rule::unique('sun_roofs')->where(function ($query) {
                        return $query->where('sun_roof' , request('sun_roof'));
                    }),
                ],
            ]
        );

        if($validator->fails()) 
        {
            return redirect('admin/sun_roof/create')->withErrors($validator)->withInput();
        }

        $sun_roofs = [] ;
        $sun_roofs['sun_roof'] = $request['sun_roof'] ;
        $sun_roofs['created_at'] = Carbon::now();

        SunRoof::insert($sun_roofs);
        return redirect('admin/sun_roof')->with('message' , 'You Created the Sun Roof successfully');
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
        $sun_roof = SunRoof::where('id',$id)->first();
        return  view('admin.POS.Condition.Sun_Roof.update' , compact('sun_roof'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'sun_roof' => [
                    'required' ,
                    Rule::unique('sun_roofs')->where(function ($query){
                        return $query->where('sun_roof' , request('sun_roof'));
                    })->ignore($id),
                ],
            ]
        );
        if($validator->fails()) {
            return redirect('admin/sun_roof/'.$id.'/edit')->withErrors($validator)->withInput();
        }
        $updateDatas = [] ;
        $updateDatas['sun_roof'] = $request['sun_roof'] ;
        $updateDatas['updated_at'] = Carbon::now();

        SunRoof::where('id',$id)->update($updateDatas);
        return redirect('admin/sun_roof')->with('message','You updated the record successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SunRoof::find($id)->delete();
        return response()->json('You deleted the record successfully');
    }
}
