<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\machine ;
use Carbon\Carbon ;
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
                if($data < 1) {
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
                $comparson = $data = DB::table($tableName)->where('code_id' , $request->carCode . $id)->first() ;
                $updateds = [] ;
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
}
