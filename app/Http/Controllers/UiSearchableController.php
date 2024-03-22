<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Before_Sale ;

class UiSearchableController extends Controller
{
    public function apisearch ($id ) {
        $data = Before_Sale::select('brands.brand_name as brand', 'cars.id as id','car_models.model_name as carName','engine_powers.engine_power as enginePower','transmission_types.transmission_type as fuleType',
            'years.year as year','license_states.state as licenseState','grades.grade as grade','engine_types.type as type')
                        ->LeftJoin('cars','before__sales.car_item','cars.id')
                        ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                        ->leftJoin('items','cars.item_id','items.id')
                        ->leftJoin('car_models','owner_books.model_id','car_models.id')
                        ->leftJoin('years','owner_books.year_id','years.id')
                        ->leftJoin('engine_powers','owner_books.engine_power_id','engine_powers.id')
                        ->leftJoin('license_states','owner_books.license_state','license_states.id')
                        ->leftJoin('brands','car_models.brand_id','brands.id')
                        ->leftJoin('transmission_types','owner_books.transmission_type','transmission_types.id')
                        ->leftJoin('grades','car_models.id','grades.carModel_id')
                        ->leftJoin('engines','grades.engine_id','engines.id')
                        ->leftJoin('engine_types','engines.Fuel','engine_types.id')
                        ->where('cars.id','=',$id)
                        ->first();
        return response()->json($data);
    }
}
