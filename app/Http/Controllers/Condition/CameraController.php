<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Camera ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon ;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cameras = Camera::get();
        return view('admin.POS.Condition.Camera.index',compact('cameras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.POS.Condition.Camera.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'camera' => [
                    'required' ,
                    Rule::unique('cameras')->where(function($query){
                        return $query->where('camera',request('camera'));
                    }),
                ],
            ]
        );
        if($validator->fails()) 
        {
            return redirect('admin/camera/create')->withErrors($validator)->withInput();
        }
        $cameras = [] ;
        $cameras['camera'] = $request['camera'];
        $cameras['created_at'] = Carbon::now();

        Camera::insert($cameras);
        return redirect('admin/camera')->with('message','You created the camera Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $camera = Camera::where('id',$id)->first();
        return view('admin.POS.Condition.Camera.update',compact('camera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'camera' => [
                    'required' ,
                    Rule::unique('cameras')->ignore($id),
                ],
            ],
        );
        if($validator->fails())
        {
            return redirect('admin/camera/'.$id.'/edit')->withErrors($validator)->withInput();
        }
        $updatedDatas = [];
        $updatedDatas['camera'] = $request['camera'] ;
        $updatedDatas['updated_at'] = Carbon::now();
        Camera::where('id',$id)->update($updatedDatas);
        return redirect('admin/camera')->with('message','You updated the Camera Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Camera::find($id)->delete();
        return response()->json('you deleted the Camera successfully');
    }
}
