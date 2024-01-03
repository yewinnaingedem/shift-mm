<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand ;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon ;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands  = Brand::get();
        return view('admin.POS.Brand.index' , compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.POS.Brand.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all() ,
            [
                'brand' => 'required|unique:brands,brand_name' ,
            ]
        );
        if($validation->fails()) {
            return redirect('admin/brand/create')->withErrors($validation)->withInput() ;
        }
        $inputs = [] ;
        $inputs['brand'] = $request['brand'] ;
        $inputs['created_at'] = Carbon::now();
        Brand::insert($inputs);
        return redirect('admin/brands') ;
    }

    
    public function show(string $id)
    {
        $data = Brand::where('id',$id)->first();
        return view('admin.cars.brand.show')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Brand::where('id',$id)->first();
        return view('admin.cars.brand.updated' , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make(
            $request->all() ,
            [
                'brand_name' => 'required' ,
                'model' => ['required','numeric'] ,
                'make'       => 'required|string',
                'name' => 'required|string'
            ]    
        );
        if($validation->fails()) {
            return redirect('admin/brands/'.$id.'/edit')->withErrors($validation)->withInput();
        }
        $datas = [] ;
        $datas['brand_name'] = $request->brand_name ;
        $datas['model'] = $request->model ;
        $datas['make'] = $request->make ;
        $datas['name'] = $request->name ;
        $data['updated_at'] = Carbon::now();

        Brand::where('id',$id)->update($datas);
        return redirect('admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Brand::where('id',$id)->delete() ;
        return response()->json('Yep! you deleted it ');
    }
}
