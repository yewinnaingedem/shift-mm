<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Sale ;
use App\Models\MadeIn ;
use App\Models\SearchQuery ;
use App\Models\Car\Car ;
use Illuminate\Support\Facades\Cache;
use Stevebauman\Location\Facades\Location;


class MMCarsController extends Controller
{
    public function pageLimit ($num) {
        return $num ;
    }
    public function shopMM() {
        
        $query = Sale::select(
                        'sales.id as sale_id',
                        'sales.price',
                        'car_models.model_name',
                        'brands.brand_name',
                        'owner_books.license_plate',
                        'owner_books.vin',
                        'transmission_types.transmission_type',
                        'grades.grade as main_grade',
                        'items.kilo_meter' ,
                        'car_images.*',
                        'license_states.state',
                        'sales.bestSeller' ,
                        'years.year',
                        'company_infos.industry_name as company_name'
                    )
                    ->leftJoin('automobile_sales','sales.automobile_sale_id','automobile_sales.id')
                    ->leftJoin('cars','sales.automobile_sale_id','cars.id')
                    ->leftJoin('company_infos','automobile_sales.company_id','company_infos.id')
                    ->leftJoin('car_images','cars.car_image_id','car_images.id')
                    ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                    ->leftJoin('car_models', 'owner_books.model_id' , 'car_models.id')
                    ->leftJoin('brands','car_models.brand_id','brands.id')
                    ->leftJoin('years','owner_books.year_id','years.id')
                    ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
                    ->leftJoin('license_states','owner_books.license_state','license_states.id')
                    ->leftJoin('items','cars.item_id','items.id')
                    ->leftJoin('grades','items.grade','grades.id') ;
        if (session()->has('searchQuery')) {
            $brand = session()->get('searchQuery.brand');
            $model = session()->get('searchQuery.model');
            if (isset($brand)) {
                $query->where('brands.brand_name','like','%'. $brand . '%');
            }
            if (isset($model)) {
                $query->where('car_models.model_name','like','%'. $model . '%');
            }
            $datas = $query->get() ;
        }else {
            $datas = $query
                    ->inRandomOrder()
                    ->paginate($this->pageLimit(4));
        }
        $totals = Sale::count();
        $searchQueries = SearchQuery::get() ;
        return view('MM.index')->with('datas',$datas)->with('totals',$totals)->with('searchQueries' , $searchQueries);
    }


    public function index () {
        return view('MM.main');
    }

    public function getAll () {
        $datas = Sale::select(
            'sales.id as sale_id',
            'sales.price',
            'car_models.model_name',
            'brands.brand_name',
            'owner_books.license_plate',
            'owner_books.vin',
            'transmission_types.transmission_type',
            'grades.grade as main_grade',
            'items.kilo_meter' ,
            'car_images.*',
            'license_states.state',
            'years.year'
        )
        ->leftJoin('cars','sales.automobile_sale_id','cars.id')
        ->leftJoin('car_images','cars.car_image_id','car_images.id')
        ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
        ->leftJoin('car_models', 'owner_books.model_id' , 'car_models.id')
        ->leftJoin('brands','car_models.brand_id','brands.id')
        ->leftJoin('years','owner_books.year_id','years.id')
        ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
        ->leftJoin('license_states','owner_books.license_state','license_states.id')
        ->leftJoin('items','cars.item_id','items.id')
        ->leftJoin('grades','items.grade','grades.id')
        ->inRandomOrder()
        ->paginate($this->pageLimit(4));
        return response()->json([
            'datas' => $datas ,
        ] , 200);
    }

    public function searchable (Request $request) {
        $dataArr = $request->datas ;
        $category = $request->catgeory ;
        
        $jsonCovert = (object)[
            'dataArr' => $dataArr,
            'category' => $category,
        ];
        $combinedData = json_encode($jsonCovert);
        
        if (Cache::has($combinedData)) {
            $datas = Cache::get($combinedData);
            return response()->json([
                'datas' => $datas ,
                'cached' => true ,
            ] , 200);
        }
        if ($category == 'make_model') {
            $query = Sale::select(
                'sales.id as sale_id',
                'sales.price',
                'car_models.model_name',
                'brands.brand_name',
                'owner_books.license_plate',
                'owner_books.vin',
                'transmission_types.transmission_type',
                'grades.grade as main_grade',
                'items.kilo_meter' ,
                'car_images.*',
                'license_states.state',
                'years.year'
            )
            ->leftJoin('cars','sales.automobile_sale_id','cars.id')
            ->leftJoin('car_images','cars.car_image_id','car_images.id')
            ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
            ->leftJoin('car_models', 'owner_books.model_id' , 'car_models.id')
            ->leftJoin('brands','car_models.brand_id','brands.id')
            ->leftJoin('years','owner_books.year_id','years.id')
            ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
            ->leftJoin('license_states','owner_books.license_state','license_states.id')
            ->leftJoin('items','cars.item_id','items.id')
            ->leftJoin('made_in','items.place_of_orgin','made_in.id')
            ->leftJoin('grades','items.grade','grades.id')
            ->whereIn('made_in.country',$dataArr) ;
            
        }
        elseif ($category == 'body_style') {
            $query = Sale::select(
                'sales.id as sale_id',
                'sales.price',
                'car_models.model_name',
                'brands.brand_name',
                'owner_books.license_plate',
                'owner_books.vin',
                'owner_books.model_id',
                'transmission_types.transmission_type',
                'grades.grade as main_grade',
                'items.kilo_meter' ,
                'car_images.*',
                'license_states.state',
                'years.year'
            )
            ->leftJoin('cars','sales.automobile_sale_id','cars.id')
            ->leftJoin('car_images','cars.car_image_id','car_images.id')
            ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
            ->leftJoin('car_models', 'owner_books.model_id' , 'car_models.id')
            ->leftJoin('brands','car_models.brand_id','brands.id')
            ->leftJoin('years','owner_books.year_id','years.id')
            ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
            ->leftJoin('license_states','owner_books.license_state','license_states.id')
            ->leftJoin('items','cars.item_id','items.id')
            ->leftJoin('made_in','items.place_of_orgin','made_in.id')
            ->leftJoin('grades','items.grade','grades.id')
            ->leftJoin('body_styles','car_models.body_style_id','body_styles.id')
            ->whereIn('body_styles.body_style',$dataArr);
            
        }elseif ($category == 'year') { 
            $query = Sale::select(
                'sales.id as sale_id',
                'sales.price',
                'car_models.model_name',
                'brands.brand_name',
                'owner_books.license_plate',
                'owner_books.vin',
                'owner_books.model_id',
                'transmission_types.transmission_type',
                'grades.grade as main_grade',
                'items.kilo_meter' ,
                'car_images.*',
                'license_states.state',
                'years.year'
            )
            ->leftJoin('cars','sales.automobile_sale_id','cars.id')
            ->leftJoin('car_images','cars.car_image_id','car_images.id')
            ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
            ->leftJoin('car_models', 'owner_books.model_id' , 'car_models.id')
            ->leftJoin('brands','car_models.brand_id','brands.id')
            ->leftJoin('years','owner_books.year_id','years.id')
            ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
            ->leftJoin('license_states','owner_books.license_state','license_states.id')
            ->leftJoin('items','cars.item_id','items.id')
            ->leftJoin('made_in','items.place_of_orgin','made_in.id')
            ->leftJoin('grades','items.grade','grades.id');
            
            if (count($dataArr) > 2) {
                $query->whereIn('year', $dataArr);
            }else {
                $query->whereBetween('year' , $dataArr);
            }
        }elseif ($category == 'Makes') {
            $query = Sale::select(
                'sales.id as sale_id',
                'sales.price',
                'car_models.model_name',
                'brands.brand_name',
                'owner_books.license_plate',
                'owner_books.vin',
                'owner_books.model_id',
                'transmission_types.transmission_type',
                'grades.grade as main_grade',
                'items.kilo_meter' ,
                'car_images.*',
                'license_states.state',
                'years.year'
            )
            ->leftJoin('cars','sales.automobile_sale_id','cars.id')
            ->leftJoin('car_images','cars.car_image_id','car_images.id')
            ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
            ->leftJoin('car_models', 'owner_books.model_id' , 'car_models.id')
            ->leftJoin('brands','car_models.brand_id','brands.id')
            ->leftJoin('years','owner_books.year_id','years.id')
            ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
            ->leftJoin('license_states','owner_books.license_state','license_states.id')
            ->leftJoin('items','cars.item_id','items.id')
            ->leftJoin('made_in','items.place_of_orgin','made_in.id')
            ->leftJoin('grades','items.grade','grades.id')
            ->leftJoin('body_styles','car_models.body_style_id','body_styles.id')
            ->whereIn('brands.brand_name' , $dataArr);
        }

        $datas = $query->get() ;
        Cache::put($combinedData , $datas , now()->addMinute(20));
        return response()->json([
            'datas' => $datas ,
            'cached' => false ,
        ] , 200);
        
    }
}
