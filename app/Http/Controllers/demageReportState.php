<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\machine ;
use App\Models\Before_Sale ;
use Carbon\Carbon ;
use App\Models\Exception ;
use App\Models\Car\Car  ;
use App\Models\Panding ;
use DB ;
class demageReportState extends Controller
{
    public function report  (Request $request , $id ) {
        $data = machine::get();
        $inserts = [] ;
        foreach ($data  as $item ) {
            if($id == $item->id )  {
                $tableName = strtolower(str_replace(' ', '_', $item->name));
                $data = DB::table($tableName)->where('code_id' , $request->carCode . $id)->count() ;
                $check = $data < 0 ? true : false ;
                if($check) {
                    $inserts['fxingPoint']  = $request->fixpoint;
                    $inserts['code_id'] = $request->carCode . $id ;
                    $inserts['car_id'] = $id ;
                    $inserts['about'] = $request->about ;
                    $inserts['created_at'] = Carbon::now();
                    $getData = DB::table($tableName)->insert($inserts);
                    return response()->json([
                        'message' => $getData  ,
                        'id' => $item ,
                    ] , 200) ;
                }
                $fxingPoint = $request->fixpoint ;
                $comparson =  DB::table($tableName)->where('code_id' , $request->carCode . $id)->get() ;
                $updateds = [] ;
                // need to work tommorrow ;
                foreach ($comparson as $data ) {
                    if($request->about !== $data->about) {
                        $inserts['fxingPoint']  = $request->fixpoint;
                        $inserts['code_id'] = $request->carCode . $id ;
                        $inserts['car_id'] = $id ;
                        $inserts['about'] = $request->about ;
                        $inserts['created_at'] = Carbon::now();
                        $getData = DB::table($tableName)->insert($inserts);
                        return response()->json([
                            'message' => $getData  ,
                            'id' => $item ,
                        ] , 200) ;
                    }
                }
                if(str_replace(' ', '%', strtolower($fxingPoint)) !== str_replace(' ', '%', strtolower($comparson->fxingPoint))) {
                    $updateds['fxingPoint'] = $fxingPoint  ;
                    $updateds['pandingState'] = 0 ;
                    DB::table($tableName)->update($updateds);
                    return response()->json([
                        'message' => 'You automatically update that row' ,
                        'id' => $item ,
                    ] , 200) ;
                }
                return response()->json([
                    'message' => 'You already created the data' ,
                    'id' => $item ,
                ] , 200) ;
            }
        }
    }

    public function stateChange (Request $request) {
        $carPlate = $request->carCode;
        
        $data = Panding::select('exceptions.*', 'exceptions.id as exceptionsId' , 'cars.id as car_id','owner_books.license_plate')
                    ->leftJoin('cars' , 'pandings.car_id','cars.id')
                    ->leftJoin('owner_books','cars.owner_book_id' , "owner_books.id")
                    ->leftJoin('exceptions','cars.exception_id','exceptions.id')
                    ->where('owner_books.license_plate','=',$carPlate)
                    ->first();
        if($data->count() > 0) {
            $exception = Exception::where('id', $data->exceptionsId);
            if($request->content == "showRoom"){
                $exception->update([
                    'checkedAtShowroom' => boolval($request->name), // true string,
                ]);
                return response()->json('success for showroom');    
            }
            
            $exception->update([
                'NMVTIS' => boolval($request->name) ,
            ]);
            return response()->json('success for NMVTIS');
        }
        return response()->json('Not Found the data matched');
    }

    public function MoveNext(Request $request) {
        
        $data = Car::where('cars.id', $request->carId)
                ->leftJoin('exceptions', 'cars.exception_id', '=', 'exceptions.id')
                ->update([
                    'exceptions.engineAndSuspension' => $request->engineAndSuspension,
                    'exceptions.bodyAndPaint' => $request->paintAndBody,
                    'exceptions.TvAndWiring' => $request->tvAndWiring,
                    'exceptions.addition_exception' => $request->additional,
                    'exceptions.checkedAtShowroom' => boolval($request->showRoom),
                    'exceptions.NMVTIS' => boolval($request->nmvtis),
                ]);
        if($data) {
            if(Before_Sale::create([
                "car_item" => $request->carId ,
                'created_at' => Carbon::now() ,
            ])){
                Panding::where('car_id',$request->carId)->delete();
            }
        }
        return response()->json([
            'message' => "You Rouck" ,
            'redirect' => 'http://localhost:8000/admin/before_sale',
        ],200);
    }
}
