<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand ;
class SearchController extends Controller
{
    public function search (Request $request , $query) {
        // $query = $request->input('query');
        $product = Brand::search($query)->get() ;
        return response()->json($product);
    }
}
