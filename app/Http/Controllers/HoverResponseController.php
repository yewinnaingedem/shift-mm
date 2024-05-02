<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand ;
use App\Models\CarFucture ;
use App\Models\MadeIn ;
use App\Models\BodyStyle ;
use App\Models\Year ;
use Illuminate\Support\Facades\Cache;

class HoverResponseController extends Controller
{
    public function index ($value) {

        if($value == "Makes") {
            $data = Brand::select('brand_name as responseData')->get();
            $icon = "fa-car-side" ;
        } elseif ( $value == "make_model") {
            $data = MadeIn::select('country as responseData')->get();
            $icon = "fa-globe" ;         
        }elseif ($value == 'body_style' ) {
            $data = BodyStyle::select('body_style as responseData')->get();
            $icon = 'fa-bus' ;
        }elseif ($value == "year") {
            $data = Year::select('year as responseData')->get();
            $icon  = 'fa-calendar-days';
        }
        else {
            $data = CarFucture::select('car_models.model_name as responseData')
                    ->leftJoin('grades' , 'car_fuctures.grade_id' , 'grades.id')
                    ->leftJoin('body_styles' , 'car_fuctures.bodyStyle_id' , 'body_styles.id')
                    ->leftJoin('car_models' , 'grades.carModel_id' , 'car_models.id')
                    ->where('body_styles.body_style','=',$value)
                    ->get();
            if(count($data) == 0) {
                return response()->json([
                    'success' => false ,
                ]);
            }
        }
        return response()->json([
            'success' => true ,
            'data' => $data ,
            'icon' => $icon 
        ]);
    }

    public function  hoverText ($value) {
        $data = "";
        if (Cache::has($value)) {
            $data = Cache::get($value) ;
            return response()->json([
                'success' => true ,
                'data' => $data ,
                'cached' => true 
            ]);
        }
        if($value == "Makes") {
            $data = Brand::select('brand_name as responseData')->get();
            Cache::put($value , $data , now()->addMinutes(20)) ;
        } elseif ( $value == "make_model") {
            $data = MadeIn::select('country as responseData')->get();
            Cache::put($value , $data , now()->addMinutes(20)) ;
        }elseif ($value == 'body_style' ) {
            $data = BodyStyle::select('body_style as responseData')->get();
            Cache::put($value , $data , now()->addMinutes(20)) ;
        }elseif ($value == "year") {
            $data = Year::select('year as responseData')->get();
            Cache::put($value , $data , now()->addMinutes(20)) ;
        }
        return response()->json([
            'success' => true ,
            'data' => $data ,
            'cached' => false  
        ]);
    }

    public function searchBy ($name ) {
        session()->flash('brand' , $name);
        return redirect('mm_cars/shop_mm');
    }
}
