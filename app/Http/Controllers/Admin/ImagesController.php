<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Car_Img ;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon ;
class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $carImg = "Car_Img" ; 

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

        
        $font = Storage::disk('public')->put($this->carImg , $request->file('font'));
        $east = Storage::disk('public')->put($this->carImg , $request->file('east'));
        $side_1 = Storage::disk('public')->put($this->carImg , $request->file('side_1'));
        $side_2 = Storage::disk('public')->put($this->carImg , $request->file('side_2'));
        $interior = Storage::disk('public')->put($this->carImg , $request->file('interior'));
        $kilo = Storage::disk('public')->put($this->carImg , $request->file('kilo'));

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
        $image = Car_Img::where('id' , $id)->first();
        return view('admin.cars.img.show' , compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Car_Img::where('id',$id)->first();
        return view('admin.cars.img.update' , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $font = $request->font ? $request->file('font') : null ;
        $east = $request->east ? $request->file('east') : null ;
        $side_1 = $request->side_1 ? $request->file('side_1') : null ;
        $side_2 = $request->side_2 ? $request->file('side_2') : null ;
        $interior = $request->interior ? $request->file('interior') : null ;
        $kilo = $request->kilo ? $request->file('kilo') : null ;
        $data = [];
        $data['font'] = $font ;
        $data['east'] = $east ;
        $data['side_1'] = $side_1 ;
        $data['side_2']  = $side_2 ;
        $data['interior'] = $interior ;
        $data['kilo'] = $kilo ;
        $items = [] ;
        $inputs = [] ;
        $keys = [] ;
        foreach ($data as $item => $key) {
           if($key == null ){
                array_push($items , $item );
           }else {
                array_push($keys , $key) ;
                array_push($inputs , $item );
           }
        }
        $datas = [] ;
        foreach ($keys as $value ) {
            $data = Storage::disk('public')->put($this->carImg, $value) ;
            array_push($datas , $data);    
        }
        $combinedArray = [];
        foreach ($inputs as $index => $key) {
            $combinedArray[$key] = $datas[$index];
        }
        $combinedArray['updated_at'] = Carbon::now();
        Car_Img::where('id' , $id )->update($combinedArray);
        return redirect('admin/imgs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Car_Img::where('id' , $id)->first();
        Storage::delete('public/' . $data->font);
        Storage::delete('public/' . $data->east);
        Storage::delete('public/' . $data->side_1);
        Storage::delete('public/' . $data->side_2);
        Storage::delete('public/' . $data->interior);
        Storage::delete('public/' . $data->kilo);
        
        $data->delete() ;

        return response()->json($data);
    }
}
