<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HpPlan;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee ;
use App\Models\Car\Sale ;
use App\Models\SoldOut ;
use PDF;
use App\Models\Car\CarFunction ;
use App\Models\Buyer ;
use Carbon\Carbon ;
use App\Models\Deposit ;
use App\Models\Before_Sale ;
use App\Models\Dealer ;
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
        
        $buyerId = Buyer::insertGetId($buyer);

        $hps = [];
        $hps['hp_plan_id'] = $request['hp'];
        $hps['downpayment'] = $request['present'];
        $hps['deposit'] = $request['deposit'];
        $hps['insurance'] = $request['insurance'];
        $hps['bank_commission'] = $request['bankCommission'];
        $hps['service_charge'] = $request['serviceCharge'];
        $hps['loan_month'] = $request['monthly'];
        $hp_id = Hire_purchase::insertGetId($hps);

        
        $brokerFee = [];
        foreach ($request['broker'] as $key => $value) {
            if($value !== null ) {
                $brokerFee[$key] = $value ;
            }
        }
        if(!empty($brokerFee)) {
            $brokerId = Broker::insertGetId($brokerFee);
            $soldOuts['broker_id'] = $brokerId ;
        }
        
        $soldOuts['employee_id'] = $request['employee'];
        $soldOuts['car_id'] = $request['id'];
        $soldOuts['buyer_id'] = $buyerId;
        $soldOuts['currentMonth'] = Carbon::now()->format('Y-m');
        $soldOuts['created_at'] = carbon::today()->toDateString();
        $soldOuts['updated_at'] = carbon::today()->toDateString();
        $soldOuts['hire_purchase_id'] = $hp_id;

        SoldOut::insertGetId($soldOuts);
        Sale::where('car_id',$request['id'])->delete();
        Before_Sale::where('car_item',$request['id'])->delete();
        
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
        $dealers = Dealer::get() ;
        return view('admin.POS.Car.SoldOut.index' , compact('employees','hps','salePrice','dealers'))->with('id',$id);
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
    public function testing(Request $request) {
        
        $soldOuts = [] ;
        $buyer = [] ;
        $buyer['name'] = $request['buyer'] ;
        $buyer['phone'] = $request['phone_number'] ;
        $buyer['purchase_price'] = $request['purchase_price'] ;
        $buyer['address'] = $request['address'] ;
        
        $buyerId = Buyer::insertGetId($buyer);

        $hps = [];
        $hps['hp_plan_id'] = $request['hp'];
        $hps['downpayment'] = $request['present'];
        $hps['deposit'] = $request['deposit'];
        $hps['insurance'] = $request['insurance'];
        $hps['bank_commission'] = $request['bankCommission'];
        $hps['service_charge'] = $request['serviceCharge'];
        $hps['loan_month'] = $request['monthly'];
        $hp_id = Hire_purchase::insertGetId($hps);

        $brokerFee = [];
        foreach ($request['broker'] as $key => $value) {
            if($value !== null ) {
                $brokerFee[$key] = $value ;
            }
        }
        if(!empty($brokerFee)) {
            $brokerId = Broker::insertGetId($brokerFee);
            $soldOuts['broker_id'] = $brokerId ;
        }
        
        $deposit = [] ;
        $deposit['depositAmount']  = $request['depositAmount'] ;
        $deposit['finalDate'] = $request['finalDate'] ;
        $deposit['noted'] = $request['noted'] ;
        $deposit['created_at'] = Carbon::now();
        $depositState = Deposit::insertGetId($deposit);

        $soldOuts['employee_id'] = $request['employee'];
        $soldOuts['car_id'] = $request['id'];
        $soldOuts['buyer_id'] = $buyerId;
        $soldOuts['dealer_id'] = $request['dealer'] ;
        $soldOuts['depositState'] = $depositState ;
        $soldOuts['currentMonth'] = Carbon::now()->format('Y-m');
        $soldOuts['created_at'] = carbon::today()->toDateString();
        $soldOuts['updated_at'] = carbon::today()->toDateString();
        $soldOuts['hire_purchase_id'] = $hp_id;
        
        SoldOut::insertGetId($soldOuts);
        Sale::where('car_id',$request['id'])->delete();
        Before_Sale::where('car_item',$request['id'])->delete();
        return response()->json([
            'message' => 'successfully' ,
            'redirect' => "http://localhost:8000/admin/saled" ,
        ] , 200);
        
    }

    public function generatePDF ( string $id) {
        $record = SoldOut::select('brands.brand_name as brandName','car_models.model_name as modelName','owner_books.license_plate as licensePlate','buyers.name as buyerName'
                            ,'sold_outs.created_at as createdAt','hp_plans.hp_loan as HpLoan','dealers.name as dealerName','years.year as year','owner_books.vin as vin','items.kilo_meter as kilo_meter',
                            'car_models.id as carModelId','grades.id as gradeId','buyers.purchase_price as purchasePrice','hire_purchases.loan_month as loanMonths','hire_purchases.downpayment as downpayment'
                            ,'hire_purchases.insurance as insurance','hire_purchases.deposit as deposit','hire_purchases.service_charge as service_charge','hire_purchases.bank_commission as bank_commission')
                            ->leftJoin('cars','sold_outs.car_id','cars.id')
                            ->leftJoin('items','cars.item_id', 'items.id')
                            ->leftJoin('buyers','sold_outs.buyer_id','buyers.id')
                            ->leftJoin('dealers','sold_outs.dealer_id','dealers.id')
                            ->leftJoin('hire_purchases','sold_outs.hire_purchase_id','hire_purchases.id')
                            ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                            ->leftJoin('hp_plans','hire_purchases.hp_plan_id','hp_plans.id')
                            ->leftJoin('car_models','owner_books.model_id','car_models.id')
                            ->leftJoin('grades','car_models.id','grades.carModel_id')
                            ->leftJoin('brands','car_models.brand_id','brands.id')
                            ->leftJoin('years','owner_books.year_id','years.id')
                            ->where('sold_outs.id','=',$id)
                            ->first();
        $carFunctions = CarFunction::select('car_details.function')
                ->leftJoin('car_details','car_functions.car_detail_id','car_details.id')
                ->where('grade_id',$record->gradeId)->get();
        $purchase = str_replace(',','',$record->purchasePrice) ;
        $hpPlan = [] ;
        $hpPlan['downpaymentAmount'] = intval( $purchase * ($record->downpayment / 100) ) ;
        $hpPlan['loanAmount'] = $purchase - $hpPlan['downpaymentAmount'] ;
        $hpPlan['deposit'] = ($hpPlan['loanAmount'] * (intval($record->deposit ) / 100));
        $hpPlan['insurance'] = $purchase * (str_replace('%','',$record->insurance) / 100);
        $hpPlan['bankcomission'] = $hpPlan['loanAmount'] * (str_replace('%','',$record->bank_commission) / 100) ;
        $hpPlan['serviceCharge'] = $purchase * (str_replace('%','',$record->service_charge)/100);
        $hpPlan['emiAmount'] = $this->calculateEMI($hpPlan['loanAmount'] , 10 , $record->loanMonths);
        $hpPlan['totalAmount'] = $hpPlan['downpaymentAmount'] + $hpPlan['deposit'] + $hpPlan['insurance'] + $hpPlan['serviceCharge'] + $hpPlan['bankcomission'];
        $html = view('Admin.Dashboard.generatePDF' , compact('record' ,'carFunctions','hpPlan'));
        $pdf = PDF::loadHTML($html);
        return $pdf->stream('simple-pdf.pdf');
    }

    public function calculateEMI($principal, $rate, $term)
    {
        $monthlyRate = ($rate / 100) / 12;

        // Calculate EMI using the formula: EMI = [P * r * (1 + r)^n] / [(1 + r)^n - 1]
        $numerator = $principal * $monthlyRate * pow(1 + $monthlyRate, $term);
        $denominator = pow(1 + $monthlyRate, $term) - 1;
        $emi = $numerator / $denominator;
        $emi = round($emi, 2);
        return $emi;
    }
}
