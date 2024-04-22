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
        .year , .brand  , .model{
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
        .text-18px {
            font-size: 18px;
            font-weight: 700;
        }
        .list-none {
            list-style : none ;
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
        .cursor-not-allowed {
            cursor : not-allowed ;
        }
        .d-none {
            display : none ;
        }
        .top-15 {
            top : 15px ;
        }
        .opacity-8 {
            opacity: 0.8;
        }
        .bottom-22px {
            bottom : -22px ;
            background : tomato ;
        }
        .custom-select-wrapper {
            position: relative;
            width  : 100% ;
        }

        .select-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
            height : 57px ;
            border : 1px solid #94969e ;
            border-radius  :4px ;
        }

        .select-options {
            list-style: none;
            padding: 0;
            margin: 0;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            display: none;
            border : 1px solid #94969e ;
            border-radius : 4px ;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .select-options li {
            padding: 5px 10px;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }

        .select-options li:last-child {
            border-bottom: none;
        }

        .select-options li:hover {
            background-color: #e0e0e0;
        }
        .font-20px {
            font-size: 20px ;
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
            <div class="container-furid">
                <div class="m-5 text-center ">
                    <div class="d-inline-flex flex-row min-width-450px border-b-2 pb-2">
                        <div class="d-flex justify-content-center align-items-center w-full">
                            <h5 class="text-18px px-0">
                                <p class="px-0">Years , Make  , Modal , Grade </p>
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
                                        <select name="model_year" class="year" >
                                            <option class="d-none" selected>Year</option>
                                            @foreach($years as $year) 
                                                    <option value="{{$year->year}}" >{{$year->year}}</option>
                                            @endforeach
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
                                    <div class="wrapper  d-flex justify-content-center align-items-center px-10">
                                        <select name="make" class="cursor-not-allowed brand"  disabled>
                                            <option class="d-none" selected>Brand</option>
                                            @foreach($brands as $brand )
                                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @endforeach
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
                                    <div class="wrapper  d-flex justify-content-center align-items-center px-10">
                                        <select name="model" class="model cursor-not-allowed"  disabled>
                                            <option selected class="d-none">Chose Model</option>
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
                            
                            <div class="flex-1 wrapper active h-50" >
                                <button class="w-full disabled  cursor-not-allowed year"  disabled   type="submit">
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
            let $model_year = $('select[name="model_year"]');
            let $make = $('select[name="make"]');
            let $model = $('select[name="model"] ');
            let opitonSelected = $('.select-options');
            let dontAskMe = $("input[name='dontaskme']");
            
            $model_year.on('change' , ()=> {
                if($model_year.val() !== '') {
                    $make.prop('disabled' , false );
                    $make.removeClass('cursor-not-allowed');
                }else {
                    $make.prop('disabled' , true );
                    $make.addClass('cursor-not-allowed');
                }
            });

            $make.on('change',()=> {
                var $models = $('select[name="model"]') ;
                if($make.val() !== " ") {
                    $models.prop('disabled' , false);
                    $models.removeClass('cursor-not-allowed');
                    opitonSelected.empty();
                    $.ajax({
                        method : "get" ,
                        url : '/admin/model/' + $make.val() ,
                        data : {
                            "_token" : "{{csrf_token()}}"
                        },
                        success : (res) => {
                            if(res.response.length !== 0) {
                                $('#staticBackdrop').remove();
                                let $innerHtml = `
                                                <option class="d-none" selected>Chose Model </option>
                                                ${res.response.map(item => `
                                                    <option value="${item.id}">${item.model_name}</option>
                                                `).join('')}
                                            `; 
                                var $addAlert = 
                                `
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="fw-bold font-20px" >I am not sure If you want to add the modal for this click here</div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"  name="dontaskme" id="dontaskme">
                                                <label class="form-check-label" for="dontaskme">
                                                    Don't ask me again!
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mb-3 px-3">
                                            <div class="col-md-6">
                                                <button data-bs-dismiss="modal" aria-label="Close" class="btn btn-info">Cancel</button>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <a href="{{url('admin/car_models/create')}}" class="btn btn-primary">Add <span class="ms-2"><i class="fa-solid fa-plus"></i></span></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                                var isCheckedString = localStorage.getItem("isChecked");
                                var isChecked = JSON.parse(isCheckedString);
                                console.log(isChecked);
                                if (isChecked) {
                                    $('body').prepend($addAlert);
                                    $('#staticBackdrop').modal('show');
                                }
                                $models.empty().append($innerHtml);
                                $('.disable').prop('disabled' , false);
                                $('.active').css('background' , 'white');
                                $('.disabled').addClass('cursor-not-allowed');
                            }else {
                                swal({
                                        title: "Are you sure?",
                                        text: "You have not added the model yet ",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Go To Next Step",
                                        cancelButtonText: "No, cancel It",
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                    },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location.href = res.redirect ;
                                        } else {
                                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                                            $model.empty();
                                            $models.prop('disabled' , true);
                                            $models.addClass('cursor-not-allowed');
                                            $('.disabled').prop('disabled' , true) ;
                                            $('.disabled').addClass('cursor-not-allowed');
                                            $('.active').css('background','white')
                                        }
                                    });
                            }
                            $('.select-header').removeClass('cursor-not-allowed');
                        },
                        error : (err) => {
                            console.log(err );
                        }
                    });
                }else {
                    $models.prop('disabled' , true);
                    $models.addClass('cursor-not-allowed');
                    
                }
            });
            $model.on('change', ()=> {
                let $value = $model.val();
                if( $value !== "") {
                    $('.disabled').prop('disabled' , false) ;
                    $('.disabled').removeClass('cursor-not-allowed');
                    $('.active').css('background' , '#06CBA3');
                }
            });
            $(document).on('change',dontAskMe , function (e) {
                if ($(e.target).is(":checked")) {
                    localStorage.setItem("isChecked", JSON.stringify(false));
                } 
            });
        });
    </script>
@endsection 