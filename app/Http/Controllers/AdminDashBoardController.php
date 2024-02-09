<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoldOut ;
use App\Models\PaintDemage ;
use App\Models\SuspensionDemage ;
use App\Models\LightDemage ;
use App\Models\EngineDemage ;
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
                        ->where('deposits.state','=',0)
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
        $depositStates = SoldOut::select('deposits.*','buyers.*','brands.brand_name as brandName','owner_books.license_plate as license_plate',
                        'car_models.model_name as modelname','exterior_colors.exterior_color as exterior_color')
                        ->leftJoin('deposits','sold_outs.depositState','deposits.id')
                        ->leftJoin('buyers','sold_outs.buyer_id','buyers.id')
                        ->leftJoin('cars','sold_outs.car_id','cars.id')
                        ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                        ->leftJoin('car_models','owner_books.model_id','car_models.id')
                        ->leftJoin('brands','car_models.brand_id','brands.id')
                        ->leftJoin('exterior_colors','owner_books.exterior_color_id', 'exterior_colors.id')
                        ->where('deposits.state','=',0)
                        ->get();
        return view('admin.Dashboard.depositState' , compact('depositStates'));
    }


    public function machineState () {
        
        
        
        $pandingPaint['koWinKhiang'] = PaintDemage::where('machines.id', '1')
                                                    ->leftJoin('machines', 'paint_demages.fixer_id', 'machines.id')
                                                    ->where('paint_demages.state', 0) 
                                                    ->count();
        
        $pandingPaint['koThayLay'] = PaintDemage::where('machines.id', '4')
                                                    ->leftJoin('machines', 'paint_demages.fixer_id', 'machines.id')
                                                    ->where('paint_demages.state', 0) 
                                                    ->count();
        $engine['seventBrother'] = EngineDemage::where('machines.id','1')
                                                            ->leftJoin('machines', 'engine_demages.fixer_id', 'machines.id')
                                                            ->where('engine_demages.state',0)
                                                            ->count();
        machine::where('specialize',3)->where('name','Ko Thant Oo')->update([
            'pending_count' => $engine['seventBrother'] ,
            'updated_at' => Carbon::now() ,
        ]);
        $suspension['paukSi'] = EngineDemage::where('machines.id','3')
                                                            ->leftJoin('machines', 'engine_demages.fixer_id', 'machines.id')
                                                            ->where('engine_demages.state',0)
                                                            ->count();
        $lighter['KyawKo'] = LightDemage::where('machines.id',8)
                                            ->leftJoin('machines', 'light_demages.fixer_id', 'machines.id')
                                            ->where('light_demages.state',0)
                                            ->count();
        $engine['seventBrother'] = SuspensionDemage::where('machines.id','3')
                                    ->leftJoin('machines', 'suspension_demages.fixer_id', 'machines.id')
                                    ->where('suspension_demages.state',0)
                                    ->count();
        $machines = machine::select('machines.*','sepcializes.*')
                            ->leftJoin('sepcializes','machines.specialize','sepcializes.id')
                            ->get();
        return view('Admin.Dashboard.machineState',compact('machines'));
    }
    
}
