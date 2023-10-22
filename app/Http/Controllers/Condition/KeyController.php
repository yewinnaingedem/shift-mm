<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Key ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keys = Key::get();
        return view('admin.POS.Condition.Key.index',compact('keys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.POS.Condition.Key.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'key' => [
                    'required' ,
                    Rule::unique('keys')->where(function ($query) 
                    {
                        return $query->where('key' , request('key'));
                    }
                    ),
                ]
            ]
        );
        if($validator->fails()) 
        {
            return redirect('admin/key/create')->withErrors($validator)->withInput();
        }

        $keys = [] ;
        $keys['key'] = $request['key'] ;
        $keys['created_at'] = Carbon::now() ;

        Key::insert($keys);
        return redirect('admin/key')->with('messge','You created the key successfully');
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
        $key = Key::where('id' , $id)->first();
        return view('admin.POS.Condition.Key.update',compact('key'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'key' => [
                    'required' ,
                    Rule::unique('keys')->where(function ($qurery)
                    {
                        return $qurery->where('key' , request('key'));
                    }
                    )->ignore($id),
                ]
            ]
        );
        if($validator->fails())
        {
            return redirect('admin/Key/'.$id .'/edit')->withErrors($validator)->withIput();
        }
        $updated = [] ;
        $updated['key'] = $request['key'];
        $updated['created_at'] = Carbon::now() ;

        Key::where('id',$id)->update($updated) ;
        return redirect('admin/key')->with('message' , 'You updated the key successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Key::find($id)->delete();
        return response()->json('You deleted it ');
    }
}
