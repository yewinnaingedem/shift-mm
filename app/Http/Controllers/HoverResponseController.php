<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand ;
use App\Models\CarFucture ;
class HoverResponseController extends Controller
{
    public function index ($value) {
        if($value == "Makes") {
            $data = Brand::get();
            
        }else {
            $data = CarFucture::select('car_models.model_name as brand_name')
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
        ]);
    }
}
