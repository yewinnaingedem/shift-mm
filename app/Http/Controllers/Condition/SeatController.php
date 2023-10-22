<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seat ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seats = Seat::get() ;
        return view('admin.POS.Condition.Seat.index' , compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.POS.Condition.Seat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() , 
            [
                'seat' => 'required|unique:seats'
            ]
        );
        if($validator->fails()) {
            return redirect('admin/seat/create')->withErrors($validator)->withInput();
        }
        $inputs = [] ;
        $inputs['seat'] = $request['seat'] ;
        $inputs['created_at'] = Carbon::now();
        Seat::insert($inputs);
        return redirect('admin/seat')->with('message' , 'you created the seat successfully');
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
        $seat = Seat::where('id' , $id)->first();
        return view('admin.POS.Condition.Seat.update',compact('seat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make (
            $request->all() ,
            [
                'seat' => [
                    'required' ,
                    Rule::unique('seats')->where(function ($query ) {
                        return $query->where('seat' , request('seat'));
                    })->ignore($id),
                ]
            ]
        );
        if($validator->fails()){
            return redirect('admin/seat/'.$id.'/edit')->withErrors($validator)->withInput();
        }
        $updates = [] ;
        $updates['seat'] = $request['seat'] ;
        $updates['updated_at'] = Carbon::now();

        Seat::where('id',$id)->update($updates);
        return redirect('admin/seat')->with('message','You updated the seat successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Seat::find($id)->delete();
        return response()->json('you deleted the record successfully');
    }
}
