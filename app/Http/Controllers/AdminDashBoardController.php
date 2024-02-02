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
        return view('Admin.Dashboard.index' , compact('todaySold'));
    }

    public function SaledFor2Day() {
        $days = Carbon::now()->format('Y-m-d');
        $todaySoldes = SoldOut::select('sold_outs.*','cars.*' , 'employees.*','brokers.*','hire_purchases.*','buyers.*' , 'buyers.name as by_name' , 'employees.name as em_name')
                    ->leftJoin('cars' , 'sold_outs.car_id' , 'cars.id')
                    ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                    ->leftJoin('years','owner_books.year_id','years.id')
                    ->leftJoin('car_models','owner_books.model_id','car_models.id')
                    ->leftJoin('buyers','sold_outs.buyer_id' , 'buyers.id')
                    ->leftJoin('employees','sold_outs.employee_id', 'employees.id')
                    ->leftJoin('brokers','sold_outs.broker_id','brokers.id')
                    ->leftJoin('hire_purchases','sold_outs.hire_purchase_id','hire_purchases.id')
                    ->where('sold_outs.created_at' , $days)->get();
        dd($todaySoldes);
        return view('Admin.Dashboard.saledFor2Day', compact('todaySoldes'));
    }
    
}
