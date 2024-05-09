<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand ;
use App\Models\Car\Sale ;
use App\Models\CarModel ;
use App\Models\Year ;
use App\Models\SearchQuery ;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Cache;

class UiSearchableController extends Controller
{
    public function search ( Request $request ) {
        $seachData = $request->dataSearch ;
        $seachValue = [] ;
        $unSeeValue = [] ;
        $returnState = false ;
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
                $brandCheck = Brand::where('brand_name','like','%'.$data['id1'].'%')->exists();
                if ($brandCheck) {
                    $seachValue['brand'] = $data['id1'] ;
                }
                $modelCheck = CarModel::where('model_name','like','%'.$data['id1'].'%')->exists(); 
                if ($modelCheck) {
                    $seachValue['model'] = $data['id1'] ;
                }
                $yearCheck = Year::where('year','like','%'.$data['id1'].'%')->exists();
                if($yearCheck) {
                    $seachValue['year'] = $data['id1'] ;
                }
            }
            if (isset($data['id2'])) {
                $seachValue['id2'] =$data['id2'] ;
                $brandCheck = Brand::where('brand_name','like','%'.$data['id2'] . '%')->exists();
                if ($brandCheck) {
                    $seachValue['brand'] = $data['id2'] ;
                }
                $modelCheck = CarModel::where('model_name','like', '%'.$data['id2'] . '%')->exists(); 
                if ($modelCheck) {
                    $seachValue['model'] = $data['id2'] ;
                }
                $yearCheck = Year::where('year','like','%'.$data['id2'] . '%')->exists();
                if($yearCheck) {
                    $seachValue['year'] = $data['id2'] ;
                }
            }
        }
        $cacheKey = 'search_' . md5(json_encode($seachValue));
        
        if (Cache::has($cacheKey)) {
            $data = Cache::get($cacheKey);
            $this->sessionQuery( $data);
            return response()->json([
                'getData' => $data ,
                'returnState' => true ,
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
                            ->leftJoin('automobile_sales','sales.automobile_sale_id','automobile_sales.id')
                            ->leftJoin('cars', 'automobile_sales.car_id', 'cars.id')
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
            $returnState = true ;
            $dataQuery->orWhere('brands.brand_name', 'like', '%' . $seachValue['brand'] . '%');
        }
        if (!empty($seachValue['model'])) {
            $returnState = true ;
            $dataQuery->orWhere('car_models.model_name', 'like', '%' . $seachValue['model'] . '%');
        }
        if (!empty($seachValue['year'])) {
            $returnState = true ;
            $dataQuery->where('years.year', $seachValue['year']);
        }
        if ($returnState) {
            $data = $dataQuery->get();
            Cache::put($cacheKey , $data  , now()->addMinutes(10));
            $this->sessionQuery($data);
            // need to update tomorrow
            return response()->json([
                'getData' => $data ,
                'returnState' => false ,
                // 'unSeeValue' => $unSeeValue ,
            ] , 200 );
        }else {
            return response()->json([
                'getData' => false ,
                'returnState' => false 
            ] , 200 );
        }
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

    private function sessionQuery ( $data ) {
        $queries = [] ;
        $storageName ;
        $model_name  ;
        $brand_name;
        foreach ($data as $item) {
            $model_name = $item->model_name;
            $brand_name = $item->brand_name;
            if (!in_array(['model_name' => $model_name, 'brand_name' => $brand_name], $queries)) {
                $queries[] = ['model_name' => $model_name, 'brand_name' => $brand_name];
                $storageName = $model_name ."_". $brand_name;
            }
        }
        if (session()->has($storageName)) {
            $count = session()->get($storageName) + 1;
            session()->put($storageName, $count);
            if ($count > 5 ) {
                $query =  SearchQuery::where('search_queries','like', '%'.$storageName.'%') ;
                $queriExisted = $query->exists();
                if ($queriExisted) {
                    $statement = $query->first() ;
                    $id = $statement->id ;
                    SearchQuery::where('id', $id)->update([
                        'count' => $count
                    ]);
                }else {
                    SearchQuery::insert([
                        'search_queries' => $storageName ,
                        'model_name' => $model_name ,
                        'brand_name' => $brand_name ,
                        'count' => $count , 
                        'date' => today(),
                    ]);
                }
            }
        } else {
            session()->put($storageName, 1);
        }
    }
}
