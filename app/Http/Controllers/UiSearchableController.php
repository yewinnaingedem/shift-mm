<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car\Sale ;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Cache;

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
            if (isset($data['id1'])) {
                $seachValue['id1'] =$data['id1'] ;
            }
            if (isset($data['id2'])) {
                $seachValue['id2'] =$data['id2'] ;
            }
        }
        $cacheKey = 'search_' . md5(json_encode($seachValue));
        if (Cache::has($cacheKey)) {
            $data = Cache::get($cacheKey);
            return response()->json([
                'getData' => $data ,
                'returnState' => 'cache' ,
            ] , 200 );
        }
        
        $dataQuery = Sale::select(
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
                            'years.year','car_images.*'
                            )
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
        Cache::put($cacheKey , $data  , now()->addMinutes(10));
        return response()->json([
            'getData' => $data ,
        ] , 200 );
    }
    private function normalizeParams($params)
    {
        // Sort the parameters alphabetically by key
        ksort($params);

        // Recursively normalize nested arrays
        foreach ($params as &$param) {
            ksort($params);
            if (is_array($param)) {
                $param = $this->normalizeParams($param);
            }
        }

        return $params;
    }
}
