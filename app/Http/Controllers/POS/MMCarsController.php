<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Sale ;
use Stevebauman\Location\Facades\Location;


class MMCarsController extends Controller
{
    public function pageLimit ($num) {
        return $num ;
    }
    public function shopMM() {
        $datas = Sale::select('sales.id as sale_id' ,'sales.price', 'car_models.*' , 'brands.*','owner_books.*','transmission_types.*','grades.grade as main_grade','items.*','car_images.*','cars.*'
                ,'license_states.*'
                )
                ->leftJoin('cars','sales.car_id','cars.id')
                ->leftJoin('car_images','cars.car_image_id','car_images.id')
                ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                ->leftJoin('car_models', 'owner_books.model_id' , 'car_models.id')
                ->leftJoin('brands','car_models.brand_id','brands.id')
                ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
                ->leftJoin('license_states','owner_books.license_state','license_states.id')
                ->leftJoin('items','cars.item_id','items.id')
                ->leftJoin('grades','items.grade','grades.id')
                ->paginate($this->pageLimit(8));
        return view('MM.index')->with('datas',$datas);
    }

    public function index () {
        return view('MM.main');
    }
}
