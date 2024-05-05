<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee ;
use App\Models\Car\Sale ;
use App\Models\SoldOut ;
use App\Models\Buyer ;
use App\Models\Broker ;
use App\Models\Hire_purchase ;

class SaledController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saled_cars = SoldOut::select('owner_books.license_plate as number_plate','buyers.name','employees.full_name as employee','hp_plans.hp_loan','sold_outs.created_at','brokers.name as broker_name')
                    ->leftJoin('employee_details','sold_outs.employee_id' , 'employee_details.id')
                    ->leftJoin('employees' , 'employee_details.employee_id','employees.id')
                    ->leftJoin('cars','sold_outs.automobile_sale_id','cars.id')
                    ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                    ->leftJoin('buyers','sold_outs.buyer_id','buyers.id')
                    ->leftJoin('hire_purchases','sold_outs.hire_purchase_id','hire_purchases.id')
                    ->leftJoin('hp_plans','hire_purchases.hp_plan_id','hp_plans.id')
                    ->leftJoin('brokers' , 'sold_outs.broker_id' ,'brokers.id')
                    ->get() ;
        return view('admin.Saled.index',compact('saled_cars'));
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
        //
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
