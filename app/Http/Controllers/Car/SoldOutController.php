<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HpPlan;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee ;
use App\Models\Car\Sale ;
use App\Models\SoldOut ;
use App\Models\Buyer ;
use App\Models\Broker ;
use App\Models\Hire_purchase ;

class SoldOutController extends Controller
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
            $request->all()  ,
            [
                'buyer' => 'required' ,
                'purchase_price' => 'required' ,
                'phone_number' => 'required' ,
                'address' => 'required' ,
                'hp' => 'required' ,
                'present' => 'required' ,
                'monthly' => 'required' ,
            ]
        );
        if($validator->fails()) {
            return redirect('admin/sold_out/crete')->withErrors($validator)->withInput();
        }
        $soldOuts = [] ;
        $buyer = [] ;
        $buyer['name'] = $request['buyer'] ;
        $buyer['phone'] = $request['phone_number'] ;
        $buyer['purchase_price'] = $request['purchase_price'] ;
        $buyer['address'] = $request['address'] ;
        // $buyerId = Buyer::insertGetId($buyer);

        $hps = [];
        $hps['hp_plan_id'] = $request['hp'];
        $hps['downpayment'] = $request['present'];
        $hps['deposit'] = $request['deposit'];
        $hps['insurance'] = $request['insurance'];
        $hps['bank_commission'] = $request['bankCommission'];
        $hps['service_charge'] = $request['serviceCharge'];
        $hps['loan_month'] = $request['monthly'];
        // $hp_id = Hire_purchase::insertGetId($hps);

        if($request['broker']['name'] == null) {
            $broker = [] ;
            $broker['name'] = $request->broker['name'];
            $broker['phone'] = $request->broker['phone'];
            $broker['broker_fee'] = $request->broker['fee'] ;
            // $brokerId = Broker::insertGetId($broker);
            dd($broker);
            $soldOuts['broker_id'] = $brokerId ;
        }
        
        
        $soldOuts['employee_id'] = $request['employee'];
        $soldOuts['car_id'] = $request['id'];
        $soldOuts['buyer_id'] = $buyerId;
        $soldOuts['hire_purchase_id'] = $hp_id;
        

        
        // SoldOut::insertGetId($soldOuts);
        // Sale::where('car_id',$request['id'])->delete();
        
        return redirect('admin/saled')->with('message' , 'You Make the record successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hps = HpPlan::get();
        $employees = Employee::get();
        $salePrice = Sale::where('car_id',$id)->first('price');
        return view('admin.POS.Car.SoldOut.index' , compact('employees','hps','salePrice'))->with('id',$id);
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
        //
    }
}
