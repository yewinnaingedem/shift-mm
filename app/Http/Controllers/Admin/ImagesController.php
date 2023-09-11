<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Car_Img ;
use Illuminate\Support\Facades\Storage;
class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Car_Img::get();
        return view("admin.cars.img.index" , compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.img.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make(
            $request->all() ,
            [
                'font' => 'required|image|mimes:jpg,png,jpeg',
                'east' => 'required|image|mimes:jpg,png,jpeg',
                'side_1' => 'required|image|mimes:jpg,png,jpeg',
                'side_2' => 'required|image|mimes:jpg,png,jpeg',
                'interior' => 'required|image|mimes:jpg,png,jpeg',
                'kilo' => 'required|image|mimes:jpg,png,jpeg',
            ]
        );

        if($validation->fails()) {
            return redirect('admin/imgs/create')->withErrors($validation)->withInput() ;
        }

        $carImg = "Car_Img" ;
        $font = Storage::disk('public')->put($carImg , $request->file('font'));
        $east = Storage::disk('public')->put($carImg , $request->file('east'));
        $side_1 = Storage::disk('public')->put($carImg , $request->file('side_1'));
        $side_2 = Storage::disk('public')->put($carImg , $request->file('side_2'));
        $interior = Storage::disk('public')->put($carImg , $request->file('interior'));
        $kilo = Storage::disk('public')->put($carImg , $request->file('kilo'));

        $imgs = [] ;
        $imgs['font'] =  $font ; 
        $imgs['east'] = $east; 
        $imgs['side_1'] =  $side_1; 
        $imgs['side_2'] = $side_2; 
        $imgs['interior'] =  $interior; 
        $imgs['kilo'] =  $kilo;
    
        Car_Img::insert($imgs) ;
        session()->flush('message' , 'You created the record successfully');
        return redirect('admin/imgs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
