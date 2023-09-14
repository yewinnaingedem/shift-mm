@extends('Admin/Layout/app')

@section('title' , 'Brand || Create')


@section('style')
    <style>
        .text-white {
            color : white ;
        }
    </style>
@endsection 

@section('sidebar')
    @parent 
@endsection 

@section('navbar')
    @parent 
@endsection 
@section('content')
    <div class="container">
        <div >
            <div class="d-flex justify-content-start align-items-start mb-3"> <a href="{{url('admin/fecuters')}}" class="btn btn-primary"><i class="fa-solid fa-backward"></i> <span>Back</span>  </a></div>
            <form action="{{url('admin/fecuters')}}" method="post">
                @csrf 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="lane_depurature" value="true" id="lane_depurature">
                    <label class="form-check-label" for="lane_depurature">
                        Lane Depurature        
                    </label>
                </div>   
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="blind_sport" value="true" id="blind_sport">
                    <label class="form-check-label" for="blind_sport">
                        Blind Sport         
                    </label>
                </div>   
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="streeing_volue" value="true" id="streeing_volue">
                    <label class="form-check-label" for="streeing_volue">
                        Streeing Volue
                    </label>
                </div>   
                <div class="mb-3">
                    <label for="" class="form-label">Keys</label>
                    <select class="form-select" name="keys" >
                        <option value="simple" selected>Smiple</option>
                        <option value="push">Push Start</option>
                        <option value="smart">Smart Key</option>
                    </select>  
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Sun Roof </label>
                    <select class="form-select" >
                        <option value="simple" selected>Sun Roof </option>
                        <option value="push">Panoramic </option>
                        <option value="smart">Both </option>
                    </select>  
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Air-Con</label>
                    <select class="form-select" name="ac">
                        <option value="auto" selected>Ditigal</option>
                        <option value="manual">Manula </option>
                    </select>  
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="rounded_ac" value="true" id="rounded_ac">
                    <label class="form-check-label" for="rounded_ac">
                        Rounded Aircon
                    </label>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Transmission</label>
                    <select class="form-select" name="key">
                        <option value="auto" selected>Auto</option>
                        <option value="manual">Manual </option>
                        <option value="both">Both </option>
                    </select>  
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">VIN</label>
                    <input type="text" name="vin" id="" placeholder="Enter VIN" class="form-control">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="sun_roof" value="true" id="sun_roof">
                    <label class="form-check-label" for="sun_roof">
                        Sun Roof        
                    </label>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label mb-3">Wheels </label>
                    <select class="form-select" name="wheel" >
                        <option value="simple" selected>2 Wheels </option>
                        <option value="push">4 Wheels</option>
                        <option value="smart">All Wheels</option>
                    </select>  
                </div>
                <div class="mb-3">
                    <label for="" class="form-label mb-3">Type </label>
                    <select class="form-select"   name="type">
                        <option value="simple" selected>SUV </option>
                        <option value="push">Seadon </option>
                        <option value="smart">compact </option>
                        <option value="smart">MUV </option>
                        <option value="smart">Hatchback</option>
                        <option value="Luxury">Luxury </option>
                        <option value="en_hy">Electric / Hybird </option>
                    </select>  
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Sonor</label>
                    <select class="form-select" name="sonor">
                        <option value="back sonor" selected>Back Sonor</option>
                        <option value="round sonor">Round Sonor </option>
                    </select>  
                </div>   
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="auto_headlight" value="true" id="auto_headlight">
                    <label class="form-check-label" for="auto_headlight">
                        Auto HeadLight          
                    </label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="rain_sensor" value="true" id="rain_sensor">
                    <label class="form-check-label" for="rain_sensor">
                        Rain Sensor        
                    </label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="auto_hold" value="true" id="auto_hold">
                    <label class="form-check-label" for="auto_hold">
                        Auto Hold 
                    </label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="auto_em_b" value="true" id="auto_em_b">
                    <label class="form-check-label" for="auto_em_b">
                        Auto Emmercy Brake 
                    </label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="360_camera" value="true" id="360_camera">
                    <label class="form-check-label" for="360_camera">
                        360 Camera 
                    </label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="kick_sensor" value="true" id="kick_sensor">
                    <label class="form-check-label" for="kick_sensor">
                        Kick Sensor 
                    </label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tire_pressure" value="true" id="tire_pressure">
                    <label class="form-check-label" for="tire_pressure">
                        Tire Pressure 
                    </label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="abs" value="true" id="abs">
                    <label class="form-check-label" for="abs">
                        ABS Cencor       
                    </label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="truck_motor" value="true" id="truck_motor">
                    <label class="form-check-label" for="truck_motor">
                     Truck Motor    
                    </label>
                </div> 

                <div class="mb-3">
                    <label for="" class="form-label">Interior  Color</label>
                    <input type="text" name="interior_color" id="" placeholder="Enter Color" class="form-control text-white">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Seats</label>
                    <select class="form-select" name="seats" >
                        <option value="2rows" selected >2 <span>th</span> Rows </option>
                        <option value="3row">3 <span>th</span> Rows</option>
                        <option value="4row">4 <span>th</span> Rows </option>
                    </select>  
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection

@section('footer')
    @parent 
@endsection 
@section('script')
<script>
var countChecked = function() {
  var n = $( "input:checked" ).length;
  $( ".jquery" ).text( n + (n === 1 ? " is" : " are") + " checked!" );
};
countChecked();
 
$( "input[type=checkbox]" ).on( "click", countChecked );
</script>
@endsection 