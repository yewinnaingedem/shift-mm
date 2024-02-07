<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoldOut ;
use Carbon\Carbon ;
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
        $depositStates = SoldOut::select('deposits.*','buyers.*','brands.brand_name as brandName','owner_books.license_plate as license_plate')
                        ->leftJoin('deposits','sold_outs.depositState','deposits.id')
                        ->leftJoin('buyers','sold_outs.buyer_id','buyers.id')
                        ->leftJoin('cars','sold_outs.car_id','cars.id')
                        ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                        ->leftJoin('car_models','owner_books.model_id','car_models.id')
                        ->leftJoin('brands','car_models.brand_id','brands.id')
                        ->where('deposits.state','=',0)
                        ->get();
        return view('admin.Dashboard.depositState' , compact('depositStates'));
    }
    
}
