<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon ;
use App\Models\Employee ;
use App\Models\Position ;
use App\Models\employmentStatus ;
use App\Models\EmployeeDetail ;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees = EmployeeDetail::select('employee_details.*' ,'employee_details.id as employeeDetailsId', 'positions.role' , 'employees.*')
                    ->leftJoin('employees','employee_details.employee_id','employees.id')
                    ->leftJoin('employment_statuses','employee_details.employment_status','employment_statuses.id')
                    ->leftJoin('positions','employee_details.position_id','positions.id')
                    ->get();
        return view('Admin.Employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::get();
        $employmentStatus = EmploymentStatus::get();
        return view('Admin.Employees.create',compact('positions','employmentStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all() ,
            [
                'name' => 'required|' ,
                'email' => 'required' ,
                'date_of_birth' => 'required|date|date_format:Y-m-d' ,
                'gender' => "required" ,
                'phone' => 'required' ,
                'address' => 'required' ,
                // this is the employee details 
                'position' => 'required' ,
                'employmentStatus' => 'required' ,
                'dataOfHiring' => 'required|date|date_format:Y-m-d' ,
                'salary' => 'required' ,
                'profile' => ['image', 'mimes:jpeg,png,jpg,gif,svg'] ,
                'font-nrc' => ['image', 'mimes:jpeg,png,jpg,gif,svg'] ,
                'back-nrc' => ['image', 'mimes:jpeg,png,jpg,gif,svg'] 
            ]
        );

        if($validator->fails()) 
        {
            return redirect('admin/employees/create')->withErrors($validator)->withInput();
        }
        $nrc = 'NRC/img' ;
        $employees_info = [] ;
        $employees_info['full_name'] = $request['name'] ;
        $employees_info['email'] = $request['email'] ;
        $employees_info['phone_number'] = $request['phone'] ;
        $employees_info['date_of_birth'] = $request['date_of_birth'] ;
        $employees_info['emergency_contact_name'] = $request['family_phone'];
        $employees_info['gender'] = $request['gender'] ;
        $employees_info['address'] = $request['address'];
        if($request->hasFile('profile')) {
            $profile = Storage::disk('public')->put($nrc , $request->file('profile'));
        }
        if($request->hasFile('font-nrc')) {
            $font_nrc = Storage::disk('public')->put($nrc , $request->file('font-nrc'));
        }
        if($request->hasFile('back-nrc')) {
            $back_nrc = Storage::disk('public')->put($nrc ,$request->file('back-nrc'));
        }
        $employees_info['profile'] = $profile ;
        $employees_info['font-nrc'] = $font_nrc ;
        $employees_info['back-nrc'] = $back_nrc ;
        $employee_id = Employee::insertGetId($employees_info);

        $employee_details = [] ;
        $employee_details['employee_id'] = $employee_id ;
        $employee_details['date_of_hire'] = $request['dataOfHiring'] ;
        $employee_details['employment_status'] = $request['employmentStatus'] ;
        $employee_details['salary'] = $request['salary'] ;
        $employee_details['summary'] = $request['summary'] ;
        $employee_details['note'] = $request['note'] ;
        $employee_details['position_id'] = $request['position'] ;
        $employee_details['created_at'] = Carbon::now();

        EmployeeDetail::insert($employee_details);
        
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
        $employee = EmployeeDetail::select('employee_details.*' , 'positions.role' , 'employees.*')
                    ->leftJoin('employees','employee_details.employee_id','employees.id')
                    ->leftJoin('employment_statuses','employee_details.employment_status','employment_statuses.id')
                    ->leftJoin('positions','employee_details.position_id','positions.id')
                    ->where('employee_details.id',$id)
                    ->first();
        return view('Admin/employees/update' , compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd('hi');
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
