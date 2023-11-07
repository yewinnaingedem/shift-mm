<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon ;
use App\Models\Employee ;
use App\Models\Position ;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees = Employee::select('employees.*' , 'positions.role')
                        ->leftJoin('positions','employees.position','positions.id')
                        ->get();
        return view('Admin.Employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::get();
        return view('Admin.Employees.create',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'name' => 'required|unique:employees' ,
                'phone' => 'required' ,
                'email' => 'required' ,
                'position' => 'required' ,
                'age' => 'required' ,
                'start_date' => 'required|date|date_format:Y-m-d' ,
                'address' => 'required' ,
                'salary' => 'required' ,
                'font-nrc' => ['image', 'mimes:jpeg,png,jpg,gif,svg'] ,
                'back-nrc' => ['image', 'mimes:jpeg,png,jpg,gif,svg'] 
            ]
        );

        if($validator->fails()) 
        {
            return redirect('admin/employees/create')->withErrors($validator)->withInput();
        }
        
        $nrc = 'NRC/img' ;

        
        $employees = [] ;
        $employees['name'] = $request['name'] ;
        $employees['email'] = $request['email'] ;
        $employees['phone'] = $request['phone'] ;
        $employees['position'] = $request['position'] ;
        $employees['age'] = $request['age'] ;
        $employees['address'] = $request['address'];
        if($request->hasFile('font-nrc')) {
            $font_nrc = Storage::disk('public')->put($nrc , $request->file('font-nrc'));
        }
        // $validator->errors()->add('field_name','errors message');
        if($request->hasFile('back-nrc')) {
            $back_nrc = Storage::disk('public')->put($nrc ,$request->file('back-nrc'));
        }
        $employees['font-nrc'] = $font_nrc ;
        $employees['back-nrc'] = $back_nrc ;
        $employees['start_date'] = $request['start_date'] ;
        $employees['salary'] = $request['salary'] ;
        $employees['created_at'] = Carbon::now();

        Employee::insert($employees);
        return redirect('admin/employees')->with('message','You created the employee Role Successfully');
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
        Employee::find($id)->delete();
        return response()->json('You deleted the employee Role successfully');
    }
}
