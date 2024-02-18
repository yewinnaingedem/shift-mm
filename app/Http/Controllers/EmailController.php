<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\toAdmin ;
use App\Models\Car\Car ;
class EmailController extends Controller
{
    public function index ($id , Request $request) 
    {

        $data = Car::select('owner_books.license_plate as licensePlate','brands.brand_name as brandName','car_models.model_name as modelName','grades.grade as grade')
                ->leftJoin('owner_books','cars.owner_book_id','cars.id')
                ->leftJoin('items','cars.item_id','items.id')
                ->leftJoin('car_models','owner_books.model_id','car_models.id')
                ->leftJoin('brands','car_models.brand_id','brands.id')
                ->leftJoin('grades','items.grade','grades.id')
                ->leftJoin('years','owner_books.year_id','years.id')
                ->first();
        $description = $request->description ;
        if (Mail::to('yewinnaing1160@gmail.com')
            ->cc($data->licensePlate , $data->brandName , $data->modelName , $data->grade)
            ->send(new toAdmin($data->toArray() , $description ))) {
                return response()->json('success');
        } else {
            return response()->json('error');
        }
    }
}
