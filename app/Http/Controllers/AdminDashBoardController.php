<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoldOut ;
use App\Models\PaintDemage ;
use App\Models\SuspensionDemage ;
use App\Models\LightDemage ;
use App\Models\TvFiexer ;
use App\Models\Test ;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\EngineDemage ;
use App\Models\Wiring ;
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

        $pandingPaintkoWinKhiang = PaintDemage::where('machines.id', '3')
                                                    ->leftJoin('machines', 'paint_demages.fixer_id', 'machines.id')
                                                    ->where('paint_demages.state', 0) 
                                                    ->get();
        if(!$pandingPaintkoWinKhiang->isEmpty()) {
            machine::where('specialize',$pandingPaintkoWinKhiang->first()->specialize)->where('name',$pandingPaintkoWinKhiang->first()->name)->update([
                'table_name' => 'paint_demages' ,
                'pending_count' => $pandingPaintkoWinKhiang->count(),
                'updated_at' => Carbon::now() ,
            ]);
        }else {
            machine::where('id', 3)->update([
                'table_name' => 'paint_demages' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }

        $pandingPaintkoThayLay = PaintDemage::where('machines.id', '4')
                                                    ->leftJoin('machines', 'paint_demages.fixer_id', 'machines.id')
                                                    ->where('paint_demages.state', 0) 
                                                    ->get();
        if(!$pandingPaintkoThayLay->isEmpty()) {
            machine::where('specialize',$pandingPaintkoThayLay->first()->specialize)->where('name',$pandingPaintkoThayLay->first()->name)->update([
                'table_name' => 'paint_demages' ,
                'pending_count' => $pandingPaintkoThayLay->count(),
                'updated_at' => Carbon::now() ,
            ]);
        }else {
            machine::where('id', 4)->update([
                'table_name' => 'paint_demages' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }

        $engineKoThanOo = EngineDemage::where('machines.id','1')
                                        ->leftJoin('machines', 'engine_demages.fixer_id', 'machines.id')
                                        ->where('engine_demages.state',0)
                                        ->get();
        if(!$engineKoThanOo->isEmpty()) {
            machine::where('specialize',$engineKoThanOo->first()->specialize)->where('name',$engineKoThanOo->first()->name)->update([
                'table_name' => 'engine_demages' ,
                'pending_count' => $engineKoThanOo->count(),
                'updated_at' => Carbon::now() ,
            ]);
        }else {
            machine::where('id', 1)->update([
                'table_name' => 'engine_demages' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }
        
        // For suspensionPaukSi
        $enginePaukSi = EngineDemage::where('machines.id','8')
                                        ->leftJoin('machines', 'engine_demages.fixer_id', 'machines.id')
                                        ->where('engine_demages.state',0)
                                        ->get();
        if(!$enginePaukSi->isEmpty()) {
            machine::where('specialize',$enginePaukSi->first()->specialize)->where('name',$enginePaukSi->first()->name)->update([
                'table_name' => 'engine_demages' ,
                'pending_count' => $enginePaukSi->count(),
                'updated_at' => Carbon::now(),
            ]);
        }else {
            machine::where('id', 8)->update([
                'table_name' => 'engine_demages' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }
        
        // For lighterKoSomething
        $lighterKoSomething = LightDemage::where('machines.id','6')
                                            ->leftJoin('machines', 'light_demages.fixer_id', 'machines.id')
                                            ->where('light_demages.state',0)
                                            ->get();
        if(!$lighterKoSomething->isEmpty()) {
            machine::where('specialize',$lighterKoSomething->first()->specialize)->where('name',$lighterKoSomething->first()->name )->update([
                'table_name' => 'light_demages' ,
                'pending_count' => $lighterKoSomething->count(),
                'updated_at' => Carbon::now(),
            ]);
        }else {
            machine::where('id', 6)->update([
                'table_name' => 'light_demages' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }
        
        $lighterKoKyawKo = LightDemage::where('machines.id',5)
                                        ->leftJoin('machines', 'light_demages.fixer_id', 'machines.id')
                                        ->where('light_demages.state',0)
                                        ->get();
        if(!$lighterKoKyawKo->isEmpty()) {
            machine::where('specialize',$lighterKoKyawKo->first()->specialize)->where('name',$lighterKoKyawKo->first()->name)->update([
                'table_name' => 'light_demages' ,
                'pending_count' => $lighterKoKyawKo->count(),
                'updated_at' => Carbon::now(),
            ]);
        }else {
            machine::where('id', 5)->update([
                'table_name' => 'light_demages' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }

        $suspensionkoThanOo = SuspensionDemage::where('machines.id','2')
                                    ->leftJoin('machines', 'suspension_demages.fixer_id', 'machines.id')
                                    ->where('suspension_demages.state',0)
                                    ->get();
        if(!$suspensionkoThanOo->isEmpty()) {
            machine::where('specialize',$suspensionkoThanOo->first()->specialize)->where('name',$suspensionkoThanOo->first()->name)->update([
                'table_name' => 'suspension_demages' ,
                'pending_count' => $suspensionkoThanOo ,
                'updated_at' => Carbon::now() ,
            ]);
        }else {
            machine::where('id', 2)->update([
                'table_name' => 'suspension_demages' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }

        $suspensionKoPaukSi = SuspensionDemage::where('machines.id','9')
                                    ->leftJoin('machines', 'suspension_demages.fixer_id', 'machines.id')
                                    ->where('suspension_demages.state',0)
                                    ->get();
        if(!$suspensionKoPaukSi->isEmpty()) {
            machine::where('specialize',$suspensionKoPaukSi->first()->specialize)->where('name', $suspensionKoPaukSi->first()->name)->update([
                'table_name' => 'suspension_demages' ,
                'pending_count' => $suspensionKoPaukSi->count() ,
                'updated_at' => Carbon::now() ,
            ]);    
        }else {
            machine::where('id', 11)->update([
                'table_name' => 'suspension_demages' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }

        $wiringkoThitKo = Wiring::where('machines.id',)
                                    ->leftJoin('machines','wirings.fixer_id','machines.id')
                                    ->where('wirings.state',0)
                                    ->get();
        if(!$wiringkoThitKo->isEmpty()) {
            machine::where('specialize',$wiringkoThitKo->first()->specialize)->where('name', $wiringkoThitKo->first()->name)->update([
                'table_name' => 'wirings' ,
                'pending_count' => $wiringkoThitKo->count ,
                'updated_at' => Carbon::now() ,
            ]);
        }else {
            machine::where('id', 11)->update([
                'table_name' => 'wirings' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }

        $tvkoChitPu = TvFiexer::where('machines.id','11')
                            ->leftJoin('machines','tv_fiexers.fixer_id','machines.id')
                            ->where('tv_fiexers.state',0)
                            ->get();
        if(!$tvkoChitPu->isEmpty()) {
            machine::where('specialize',$tvkoChitPu->first()->specialize)->where('name', $tvkoChitPu->first()->name)->update([
                'table_name' => 'tv_fiexers' ,
                'pending_count' => $tvkoChitPu->count() ,
                'updated_at' => Carbon::now() ,
            ]);
        }else {
            machine::where('id', 11)->update([
                'table_name' => 'tv_fiexers' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }

        $tvKoPaukSi = TvFiexer::where('machines.id','10')
                            ->leftJoin('machines','tv_fiexers.fixer_id','machines.id')
                            ->where('tv_fiexers.state',0)
                            ->get();
        
        if(!$tvKoPaukSi->isEmpty()) {
            machine::where('specialize',$tvKoPaukSi->first()->specialize)->where('name', $tvKoPaukSi->first()->name)->update([
                'table_name' => 'tv_fiexers' ,
                'pending_count' => $tvKoPaukSi->count() ,
                'updated_at' => Carbon::now() ,
            ]);
        }else {
            machine::where('id', 10)->update([
                'table_name' => 'tv_fiexers' ,
                'pending_count' => 0 ,
                'updated_at' => Carbon::now() ,
            ]);
        }
        
        $machines = machine::select('machines.*','sepcializes.*')
                            ->leftJoin('sepcializes','machines.specialize','sepcializes.id')
                            ->get();
        return view('Admin.Dashboard.machineState',compact('machines'));
    }

    public function seeDetial($specialize , $name) {
        $data = machine::where('specialize',$specialize)->where('name',$name)->first();
        $modelName = $data->table_name ;
        $states = DB::table($modelName)
                    ->select('owner_books.*','cars.*',$modelName.'.*')
                    ->leftJoin('cars', $modelName . ".car_id", '=', 'cars.id')
                    ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                    ->where('fixer_id', $data->id)
                    ->where($modelName.'.state', 0)
                    ->get();
        return view('Admin.Dashboard.SeeDetails',compact('states'));
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
            $data = Test::get() ;
            $jsonEncode = json_encode($data);
            $path_file = "resources/js/Component/UISearchable/data.json" ;
            Storage::disk('public')->put($path_file, $data);
            return response()->json(['message' => 'Data stored as JSON successfully', 'file_path' => $path_file]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
