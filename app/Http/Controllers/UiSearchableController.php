<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car\Sale ;
use Illuminate\Support\Facades\Storage; 

class UiSearchableController extends Controller
{
    public function apisearch ( Request $request ) {
        $seachData = $request->dataSearch ;
        $seachValue = [] ;
        foreach ($seachData as $data ) {
            if (isset($data['brand'])) {
                $seachValue['brand'] =$data['brand'] ;
            }
            if (isset($data['model'])) {
                $seachValue['model'] =$data['model'] ;
            }
            if (isset($data['year'])) {
                $seachValue['year'] =$data['year'] ;
            }
        }

        // return response()->json([
        //     'requests' => $seachValue['brand'] ,
        // ] , 404 );
        
        $dataQuery = Sale::select('brands.brand_name as brand', 'sales.*', 'cars.id as id', 'car_models.model_name as carName', 'engine_powers.engine_power as enginePower', 'transmission_types.transmission_type as fuelType',
                            'years.year as year', 'license_states.state as licenseState','car_models.brand_id','owner_books.model_id', 'items.*', 'owner_books.*', 'grades.grade as grade', 'engine_types.type as type', 'car_images.*')
                            ->leftJoin('cars', 'sales.car_id', 'cars.id')
                            ->leftJoin('owner_books', 'cars.owner_book_id', 'owner_books.id')
                            ->leftJoin('car_images', 'cars.car_image_id', 'car_images.id')
                            ->leftJoin('items', 'cars.item_id', 'items.id')
                            ->leftJoin('car_models', 'owner_books.model_id', 'car_models.id')
                            ->leftJoin('years', 'owner_books.year_id', 'years.id')
                            ->leftJoin('license_states', 'owner_books.license_state', 'license_states.id')
                            ->leftJoin('brands', 'car_models.brand_id', 'brands.id')
                            ->leftJoin('transmission_types', 'owner_books.transmission_type', 'transmission_types.id')
                            ->leftJoin('grades', 'car_models.id', 'grades.carModel_id')
                            ->leftJoin('engines', 'grades.engine_id', 'engines.id')
                            ->leftJoin('engine_types', 'engines.Fuel', 'engine_types.id')
                            ->leftJoin('engine_powers','engines.engine_power_id','engine_powers.id');
        if (!empty($seachValue['brand'])) {
            $dataQuery->where('brands.brand_name', 'like', '%' . $seachValue['brand'] . '%');
        }
        if (!empty($seachValue['model'])) {
            $dataQuery->where('car_models.model_name', 'like', '%' . $seachValue['model'] . '%');
        }
        if (!empty($seachValue['year'])) {
            $dataQuery->where('years.year', $seachValue['year']);
        }
        
        $data = $dataQuery->get();
        
        return response()->json([
            'getData' => $data ,
        ] , 200 );
    }
}
