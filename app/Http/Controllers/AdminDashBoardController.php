<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoldOut ;
use App\Models\PaintDemage ;
use App\Models\SuspensionDemage ;
use App\Models\LightDemage ;
use App\Models\TvFiexer ;
use App\Models\Test ;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\EngineDemage ;
use App\Models\Wiring ;
use App\Models\Before_Sale ;
use App\Models\Car\Sale ;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon ;
use App\Models\machine ;
class AdminDashBoardController extends Controller
{
    public function index () {
        $currentDay = Carbon::now()->format('Y-m-d');
        $todaySold = SoldOut::where('created_at' , $currentDay)->count();
        // deposit state 
        $depositStates = SoldOut::select('deposits.*')
                        ->leftJoin('deposits','sold_outs.depositState','deposits.id')
                        ->where('deposits.deposit_state','=',0)
                        ->count();
        return view('Admin.Dashboard.index' , compact('todaySold' , 'depositStates'));
    }

    public function SaledFor2Day() {
        $days = Carbon::now()->format('Y-m-d');
        $todaySoldes = SoldOut::select('sold_outs.*','cars.*' , 'employees.*','brokers.*','hire_purchases.*','buyers.*' , 'buyers.name as by_name' , 'employees.name as em_name'
                    ,'sold_outs.created_at as dateTime','brands.brand_name as brand_name','years.year as year','owner_books.license_plate as license_plate',
                    'hp_plans.hp_loan as hp_loan','deposits.noted as noted','deposits.finalDate as finalDate','deposits.depositAmount as depositAmount',
                    'hire_purchases.deposit as deposit','hire_purchases.downpayment as asdownpayment','exterior_colors.exterior_color as exterior_color',
                    'brokers.name as brokerName','dealers.name as dealerName','car_images.*' , 'car_images.id as imageId')
                    ->leftJoin('cars' , 'sold_outs.car_id' , 'cars.id')
                    ->leftJoin('car_images','cars.car_image_id','car_images.id')
                    ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                    ->leftJoin('years','owner_books.year_id','years.id')
                    ->leftJoin('car_models','owner_books.model_id','car_models.id')
                    ->leftJoin('brands','car_models.brand_id','brands.id')
                    ->leftJoin('buyers','sold_outs.buyer_id' , 'buyers.id')
                    ->leftJoin('employees','sold_outs.employee_id', 'employees.id')
                    ->leftJoin('deposits','sold_outs.depositState' , 'deposits.id')
                    ->leftJoin('brokers','sold_outs.broker_id','brokers.id')
                    ->leftJoin('hire_purchases','sold_outs.hire_purchase_id','hire_purchases.id')
                    ->leftJoin('hp_plans','hire_purchases.hp_plan_id','hp_plans.id')
                    ->leftJoin('dealers','sold_outs.dealer_id','dealers.id')
                    ->leftJoin('exterior_colors','owner_books.exterior_color_id','exterior_colors.id')
                    ->where('sold_outs.created_at' , $days)->get();
        return view('Admin.Dashboard.saledFor2Day', compact('todaySoldes'));
    }

    public function depositSate () {
        $depositStates = SoldOut::select('deposits.*','buyers.*','sold_outs.id as mainId','brands.brand_name as brandName','owner_books.license_plate as license_plate',
                        'car_models.model_name as modelname','exterior_colors.exterior_color as exterior_color')
                        ->leftJoin('deposits','sold_outs.depositState','deposits.id')
                        ->leftJoin('buyers','sold_outs.buyer_id','buyers.id')
                        ->leftJoin('cars','sold_outs.car_id','cars.id')
                        ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                        ->leftJoin('car_models','owner_books.model_id','car_models.id')
                        ->leftJoin('brands','car_models.brand_id','brands.id')
                        ->leftJoin('exterior_colors','owner_books.exterior_color_id', 'exterior_colors.id')
                        ->where('deposits.deposit_state','=',0)
                        ->get();
        return view('admin.Dashboard.depositState' , compact('depositStates'));
    }


    public function machineState () {
        $mechinses = machine::get();
        $mechinCounts = [] ;
        foreach ($mechinses as $mechinsesName) {
            $tableName = strtolower(str_replace(' ', '_', $mechinsesName->name));
            if (Schema::hasTable($tableName)) {
                $data= DB::table($tableName)->where('pandingState',0)->count();
                $mechinCounts[$mechinsesName->name ] = $data ;
            }
        }
        return view('Admin.Dashboard.machineState',compact('mechinses', 'mechinCounts'));
    }

    // ->leftJoin('cars',$tableName.'car_id' ,'cars.id')
                    // ->leftJoin('')
    public function seeDetial( $name) {
        $tableName = strtolower(str_replace(' ', '_', $name));
        if (Schema::hasTable($tableName)) {
            $states= DB::table($tableName)
                    ->where('pandingState',0)
                    ->get();
            return view('Admin.Dashboard.SeeDetails',compact('states','tableName'));    
        }
        dd("none");
        
    }

    public function stateChange ($id , Request $request) {
        $tableName =  $request->name;
        if (Schema::hasTable($tableName)) {
            $states= DB::table($tableName)
                    ->where('code_id',$id)
                    ->update([
                        'pandingState' => 1 ,
                        'updated_at' => Carbon::now() ,
                    ]);
            return response()->json([
                'message' => 'success',
            ] , 200);
        }
    }

    public function histroyOfSellingCar () {
        $records = SoldOut::select('owner_books.license_plate as licensePlate','buyers.name as buyerName','hp_plans.hp_loan as hpPlan' ,'hire_purchases.loan_month as loanMonths'
                            ,'sold_outs.created_at as createdAt', 'buyers.purchase_price as purchasePrice','car_models.model_name as modelName','sold_outs.id as soldOutId')
                            ->leftJoin('cars','sold_outs.car_id','cars.id')
                            ->leftJoin('buyers','sold_outs.buyer_id','buyers.id')
                            ->leftJoin('hire_purchases','sold_outs.hire_purchase_id','hire_purchases.id')
                            ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                            ->leftJoin('hp_plans','hire_purchases.hp_plan_id','hp_plans.id')
                            ->leftJoin('car_models','owner_books.model_id','car_models.id')
                            ->get();
        return view('Admin.Dashboard.historyOfSellingCars', compact('records'));
    }

    public function refleshJson() {
        try {
            $data = Sale::select('brands.brand_name as brand', 'cars.id as id','car_models.model_name as carName','engine_powers.engine_power as enginePower','transmission_types.transmission_type as fuleType',
            'years.year as year','license_states.state as licenseState','grades.grade as grade','engine_types.type as type')
                        ->LeftJoin('cars','sales.car_id','cars.id')
                        ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                        ->leftJoin('items','cars.item_id','items.id')
                        ->leftJoin('car_models','owner_books.model_id','car_models.id')
                        ->leftJoin('years','owner_books.year_id','years.id')
                        ->leftJoin('engine_powers','owner_books.engine_power_id','engine_powers.id')
                        ->leftJoin('license_states','owner_books.license_state','license_states.id')
                        ->leftJoin('brands','car_models.brand_id','brands.id')
                        ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
                        ->leftJoin('grades','car_models.id','grades.carModel_id')
                        ->leftJoin('engines','grades.engine_id','engines.id')
                        ->leftJoin('engine_types','engines.Fuel','engine_types.id')
                        ->get();
            $jsonEncode = json_encode($data);
            $sourceFilePath = base_path('resources\js\Component\UISearchable\data.json');
            $path_file = File::put($sourceFilePath, $jsonEncode);
            return response()->json(['message' => 'Data stored as JSON successfully', 'file_path' => $path_file]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
