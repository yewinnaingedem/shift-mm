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
        $sale = Sale::select('sales.id as sale_id' ,'sales.price', 'cars.id as mainId' ,'car_models.*' , 'brands.*','owner_books.*','grades.grade as grade_main','transmission_types.*','items.*','car_images.*','cars.*','grades.default_function_id as df_id'
                        ,'exterior_colors.exterior_color as exterior'  , 'engine_powers.engine_power as engine_power' , 'cylinders.cylinder' , 'engine_types.type as type' , 'grades.grade as mainGrade' , 'license_states.state as lincese_state_main' )
                        ->leftJoin('cars','sales.car_id','cars.id')
                        ->leftJoin('car_images','cars.car_image_id','car_images.id')
                        ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                        ->leftJoin('car_models', 'owner_books.model_id' , 'car_models.id')
                        ->leftJoin('engine_powers' , 'owner_books.engine_power_id' , 'engine_powers.id')
                        ->leftJoin('brands','car_models.brand_id','brands.id')
                        ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
                        ->leftJoin('items','cars.item_id','items.id')
                        ->leftJoin('license_states' , 'owner_books.license_state' , 'license_states.id')
                        ->leftJoin('exterior_colors','owner_books.exterior_color_id' , 'exterior_colors.id')
                        ->leftJoin('grades','items.grade','grades.id')
                        ->leftJoin('engines' ,'grades.engine_id' , 'engines.id')
                        ->leftJoin('cylinders' , 'engines.Cylinder_id' , 'cylinders.id')
                        ->leftJoin('engine_types' , 'engines.fuel' , 'engine_types.id')
                        ->where('sales.id',$main)
                        ->first();
        $result = Grade::select()
                ->leftJoin('car_functions','grades.id','car_functions.grade_id')
                ->leftJoin('car_details as cd','car_functions.car_detail_id','cd.id')
                ->where('grades.id',$sale->grade)
                ->get();
        $defaultFun = Grade::select()
                    ->leftJoin('default_functions as df','grades.default_function_id','df.id')
                    ->where('grades.id',$sale->grade)
                    ->first();
        $advacanceFuntions = [] ;
        foreach ($result as $value) {
            $item = $value->function ;
            array_push($advacanceFuntions , $item);
        }
        return view('MM.Main.details')->with('sale',$sale)->with('advanc',$advacanceFuntions)->with('df_id', $sale->df_id);
    }
}
