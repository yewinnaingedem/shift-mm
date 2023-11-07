<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon ;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postions = Position::get();
        return view('Admin.Position.index')->with('positions' , $postions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'role' => [
                    'required' ,
                    Rule::unique('positions')->where(function ($query ) {
                        return $query->where('role',request('role'));
                    }),
                ],
            ]
        );
        if($validator->fails()){
            return redirect('admin/positions/create')->withErrors($validator)->withInput();
        }
        $postions = [] ;
        $postions['role'] = $request['role'] ;
        $postions['created_by'] = Auth::user()->email ;
        $postions['created_at'] = Carbon::now() ;
        Position::insert($postions);
        return redirect('admin/positions')->with('message','you create the position Role successfully');
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
        // Position::find($id)->delete();
        return response()->json('You delete the Position Role successfully');
    }
}
