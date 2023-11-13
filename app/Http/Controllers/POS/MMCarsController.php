<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car\Sale ;
use Stevebauman\Location\Facades\Location;


class MMCarsController extends Controller
{
    public function index() {
        $datas = Sale::select()
                ->leftJoin('cars','sales.car_id','cars.id')
                ->leftJoin('car_images','cars.car_image_id','car_images.id')
                ->leftJoin('owner_books','cars.owner_book_id','owner_books.id')
                ->leftJoin('items','cars.item_id','items.id')
                ->get();
        return view('MM.index')->with('datas',$datas);
    }
}
