<?php

namespace App\Http\Controllers\Contant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Sale ;
use App\Models\Grade ;
use App\Models\Car\CarFunction ;

class DetailsController extends Controller
{
    public function index($carname) {
        $main = explode("id_",$carname)[1];
        $sale = Sale::select('sales.id as sale_id' ,'sales.price', 'car_models.*' , 'brands.*','owner_books.*','grades.grade as grade_main','transmission_types.*','items.*','car_images.*','cars.*')
                        ->leftJoin('cars','sales.car_id','cars.id')
                        ->leftJoin('car_images','cars.car_image_id','car_images.id')
                        ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                        ->leftJoin('car_models', 'owner_books.model_id' , 'car_models.id')
                        ->leftJoin('brands','car_models.brand_id','brands.id')
                        ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
                        ->leftJoin('items','cars.item_id','items.id')
                        ->leftJoin('grades','items.grade','grades.id')
                        ->where('sales.id',$main)
                        ->first();
        $result = Grade::select()
                ->leftJoin('car_functions','grades.id','car_functions.grade_id')
                ->leftJoin('car_details as cd','car_functions.car_detail_id','cd.id')
                ->where('grades.id',$sale->grade)
                ->get();
        
        $advacanceFuntions = [] ;
        foreach ($result as $value) {
            $item = $value->function ;
            array_push($advacanceFuntions , $item);
        }
        return view('MM.Main.details')->with('sale',$sale);
    }
}
