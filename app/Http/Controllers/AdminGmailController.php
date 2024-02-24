<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoldOut ;
use App\Mail\expiredDeposit ;
use App\Models\Deposit ;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Mail;

class AdminGmailController extends Controller
{
    public function expiredDeposit ($id) {
        $depositExpirted = SoldOut::select('deposits.*','deposits.id as changeId','buyers.*','sold_outs.id as mainId','brands.brand_name as brandName','owner_books.license_plate as license_plate',
                        'car_models.model_name as modelname','exterior_colors.exterior_color as exterior_color','sold_outs.created_at as startDate')
                            ->leftJoin('deposits','sold_outs.depositState','deposits.id')
                            ->leftJoin('buyers','sold_outs.buyer_id','buyers.id')
                            ->leftJoin('cars','sold_outs.car_id','cars.id')
                            ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                            ->leftJoin('car_models','owner_books.model_id','car_models.id')
                            ->leftJoin('brands','car_models.brand_id','brands.id')
                            ->leftJoin('exterior_colors','owner_books.exterior_color_id', 'exterior_colors.id')
                            ->where('sold_outs.id','=',$id)
                            ->where('deposits.deposit_state','=' ,0)
                            ->where('deposits.mail_state','=',0)
                            ->first();
        // return view('Admin.Mail.mail')->with('car' , $depositExpirted->toArray());
        // return response()->json($depositExpirted);
        $state = $depositExpirted !== null  ? true : false ;
        
        if($state) {
            Mail::to('yewinnaing0597@gmail.com')->send(new expiredDeposit($depositExpirted->toArray())) ;
            Deposit::where('id' , $depositExpirted->changeId)->update([
                'mail_state'=> 1 ,
                'updated_at' => carbon::now() ,
            ]);
            return response()->json([
                'message' => 'success' ,
            ],200);
        }
        return response()->json([
            'message' => "already posted" ,
        ],200);
        
    }
}
