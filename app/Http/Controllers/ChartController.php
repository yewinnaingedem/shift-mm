<?php

namespace App\Http\Controllers;
use Carbon\Carbon ;
use App\Models\SoldOut ;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function coreChart () {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year ;
        $currentDay = Carbon::now()->day ;
        
        $chart = collect() ;
        for ($day = 1 ; $day <= $currentDay; $day++) {
            $formattedDay = Carbon::createFromDate($currentYear, $currentMonth , $day) ;
            $formattedDate = $formattedDay->format('Y-m-d');
            $results = SoldOut::where('created_at', $formattedDate)->count();
            $chart->put($formattedDate, $results);
        }
        return response()->json(
            [
                'data' => $chart ,
            ], 200
        );
    }

    public function monthlyChart () {
        $currentMonth = Carbon::now()->month ;
        $currentDay = Carbon::now()->day ;
        $currentYear = Carbon::now()->year ;
        $months = collect();
        for ($month = 1 ; $month <= $currentMonth ; $month++) {
            
            $date = Carbon::now()->startOfMonth()->subMonths($currentMonth - $month);
            $monthly = $date->format('Y-m');
            $yearMonth = SoldOut::where('currentMonth' , $monthly)->count();
            $months->put($monthly , $yearMonth);
        }
        return response()->json([
            'data' => $months ,
        ], 200) ;
    }
}
