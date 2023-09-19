@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
         .customice_form {
        padding: 20px 20px;
        border-radius: 5px;
        border: 1px solid gray;
        width: 200px;
    }
    .w-50 {
        width: 50%;
        margin : auto ;
    }
    .flex-1 {
        flex : 28% 1 ;
    }
    .px-0 {
        margin: 0;
        padding: 0;
    }
    .wrapper {
        border: 1px solid #94969e;
        border-radius: 4px;
        background-color: #fff;
    }
    #Year {
        width: 100%;
        display: block;
        text-overflow: ellipsis;
        color: "#34435";
        background-image : none ;
        height: 56px;
        line-height: 40px;
        outline: none;
        background-color: transparent;
        border-style: none;
        padding: 8px 44px 8px 16px;
        appearance: none;
    }
    .min-width-450px {
        width: 460px;
        margin: auto;
    }
    .w-full {
        width: 100%;
    }
    .text-14px {
        font-size: 14px;
        font-weight: 700;
    }
    .border-b-2 {
        border-bottom: 2px solid ;
    }
    .gap-1 {
        gap : 0.75rem ;
    }
    .px-10 {
        padding-left: 10px;
        padding-right: 10px;
    }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Add Car')

@section('content')
<div class="mt-3">
        <div>
            <h1 class="text-center font-bold" >Please Start With </h1>
            <div class="container">
                <div class="m-5 text-center ">
                    <div class="d-inline-flex flex-row min-width-450px border-b-2 pb-2">
                        <div class="d-flex justify-content-center align-items-center w-full">
                            <h5 class="text-14px px-0">
                                <p class="px-0">Make , Model , Yars</p>
                            </h5>
                        </div>
                        <div class="d-flex w-full justify-content-center align-items-center ">
                            <h5 class="text-14px px-0">
                                <p class="px-0">License Plate</p>
                            </h5>
                        </div>
                        <div class="d-flex w-full justify-content-center align-items-center">
                            <h5 class="text-14px text-center px-0">
                                <p class="px-0">VIN </p>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <form action="{{url('admin/add-cars')}}" method="post">
                        @csrf 
                        <div class="mt-5 d-flex gap-1 justify-content-center ">
                            <div class="flex-1">
                                <label class="w-full ">
                                    <div class="wrapper d-flex justify-content-center align-items-center px-10">
                                        <select name="model_year" id="Year" >
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2003</option>
                                            <option value="2001">2004</option>
                                            <option value="2001">2005</option>
                                            <option value="2001">2006</option>
                                            <option value="2001">2007</option>
                                            <option value="2001">2008</option>
                                            <option value="2001">2009</option>
                                            <option value="2001">2010</option>
                                            <option value="2001">2011</option>
                                            <option value="2001">2012</option>
                                            <option value="2001">2013</option>
                                            <option value="2001">2014</option>
                                            <option value="2001">2015</option>
                                            <option value="2001">2016</option>
                                            <option value="2001">2017</option>
                                            <option value="2001">2018</option>
                                            <option value="2001">2019</option>
                                            <option value="2001">2020</option>
                                            <option value="2001">2021</option>
                                            <option value="2001">2022</option>
                                        </select>
                                        <div class="">
                                            <i class="fa-solid fa-caret-down"></i>
                                        </div>
                                    </div>
                                    @if($errors->has('model_year'))
                                        <p class="text-danger">{{ $errors->first('model_year')}} </p>
                                    @endif 
                                </label>
                                
                            </div>
                            
                            <div class="flex-1">
                                <label class="w-full ">
                                    <div class="wrapper d-flex justify-content-center align-items-center px-10">
                                        <select name="make" id="Year" >
                                            <option selected>Make</option>
                                            <option value="toyato">Toyato</option>
                                            <option value="hundai">Hundai</option>
                                            <option value="2001">KIA</option>
                                            <option value="2001">BAIC</option>
                                            <option value="2001">Soueat</option>
                                            <option value="2001">Jetour</option>
                                            <option value="2001">Hunda</option>
                                            <option value="2001">Cherovolet</option>
                                            <option value="2001">Suzuki</option>
                                            <option value="2001">Sunny</option>
                                            <option value="2001">GMC</option>
                                            <option value="2001">Changhe</option>
                                            <option value="2001">Brillance</option>
                                            <option value="2001">BYD</option>
                                        </select>
                                        <div class="">
                                            <i class="fa-solid fa-caret-down"></i>
                                        </div>
                                    </div>
                                    @if($errors->has('make'))
                                        <p class="text-danger">{{ $errors->first('make')}} </p>
                                    @endif 
                                </label>
                            </div>
                            <div class="flex-1">
                                <label class="w-full ">
                                    <div class="wrapper d-flex justify-content-center align-items-center px-10">
                                        <select name="modal" id="Year" >
                                            <option selected value="">Modal</option>
                                            <option value="2010">2001</option>
                                        </select>
                                        <div class="">
                                            <i class="fa-solid fa-caret-down"></i>
                                        </div>
                                    </div>
                                    @if($errors->has('make'))
                                        <p class="text-danger">{{ $errors->first('make')}} </p>
                                    @endif 
                                </label>
                            </div>
                            <div class="flex-1 wrapper h-50">
                                <button class="w-full " id="Year" type="submit">
                                    Get Started
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script>
        $(document).ready(()=>{
            let model_year = $('select[name="model_year"]').val();
            let make = $('select[name="model_year"]').val();
            let modal  = $('select[name="model_year"]').val();
            $('#started').click(()=>{
                $.ajax({
                    type : 'get' ,
                    url : "/admin/cars-test/"+ model_year + "/" + make + "/" + modal ,
                    success : (response) => {
                        console.log(response);
                    },
                    error : (error) => {
                        console.log(error);
                    }
                });             
            });
        });
    </script>
@endsection 