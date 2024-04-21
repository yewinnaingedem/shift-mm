@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .cursor-not-allowed {
            cursor : not-allowed ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3" >
        <form action="{{url('admin/grade')}}"  method="post">
            @csrf
            <input type="hidden" name="validation" value="{{session('models')? session('models')['model'] . '/' .session('models')['year'] : false }}">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="grade">Brand Name</label>
                    <select name="brand" id="brand" class="form-select">
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}"
                                @if (session('models'))
                                    {{ session('models')['brand'] == $brand->id ? 'selected' : null  }}
                                @endif
                            >
                                {{$brand->brand_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="models" class="form-label">Add Model</label>
                    <select class="form-select" name="model" id="models" >
                        @if (session('models'))
                            <option slected>Loading Please Wait ...</option>
                        @else
                            <option slected>Chose Model</option> 
                        @endif 
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-8">
                        <label for="model" class="form-label">Car Model</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch ">
                            <input class="form-check-input" {{ $errors->has('grade') ? 'checked' : '' }}  type="checkbox" role="switch" value="exist" id="gradeValide">
                            <label class="form-check-label" for="gradeValide">Does it have grade ?</label>
                        </div>
                    </div>
                </div>
                <input type="text" class="form-control" value="{{old('grade')}}" {{ $errors->has('grade') ? 'disabled' : '' }} placeholder="Enter Car Model" name="grade" >
                @if($errors->has('grade'))
                    <p class="text-danger">{{$errors->first('grade')}}</p>
                @endif 
            </div>
            
            
            <div class="mb-3 row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Sumbit</button> 
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{url('admin/routeBack')}}" class="btn btn-primary mb-3">
                        <i class="fa-sharp fa-solid fa-backward"></i>
                        <span>Back </span>
                    </a>
                </div>
                
            </div>
        </form>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script>
        $(document).ready(()=>{
            loadeState() ;
            var modelName = "{{session('models') ? session('models')['model'] : null }}";
            $('#gradeValide').change(function ()
            {
                let $grade = $('input[name="grade"]');
                let $existGrade = $('#gradeValide');
                if($existGrade.prop('checked')){
                    $grade.prop('disabled' , true ).addClass('cursor-not-allowed');
                }else {
                    $grade.prop('disabled' , false).removeClass('cursor-not-allowed');
                }
            }
            );
            function loadeState () {
                let val = $('#brand') ;
                $.ajax({
                    type : "get" ,
                    url : "/admin/model/" + val.val() ,
                    data : {
                        "_token" : "{{csrf_token()}}"
                    } ,
                    success : (response) => {
                        if(response.response.length !== 0) {
                            let brand = `
                                ${response.response.map(function (item) {
                                    return `<option value="${item.id}" ${item.model_name == modelName ?  'selected' : ''}>${item.model_name}</option>`;
                                }).join()}`;
                            $('#models').empty().append(brand);
                        }else {
                            $('#models').empty();
                            swal({
                                    title: "Are you sure?",
                                    text: "You will not be able to recover this imaginary file!",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Yes, delete it!",
                                    cancelButtonText: "No, cancel plx!",
                                    closeOnConfirm: false,
                                    closeOnCancel: false
                                },
                                function(isConfirm){
                                    if (isConfirm) {
                                        window.location.href = response.redirect ;
                                    } else {
                                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                                    }
                                });
                        }
                    },
                    error : (error) => {
                        console.log(error);
                    }
                });
            }
                
            $(document).on('change' , '#brand' , function () {
                let val = $('#brand') ;
                $.ajax({
                    type : "get" ,
                    url : "/admin/model/" + val.val() ,
                    data : {
                        "_token" : "{{csrf_token()}}"
                    } ,
                    success : (response) => {
                        
                        if(response.response.length !== 0) {
                            $('#models').empty();
                            let brand = `
                                <option slected class="d-none" >Chose Model</option>
                                ${response.response.map(function (item) {
                                    return `<option value="${item.id}">${item.model_name}</option>`;
                                }).join()}`;
                            $('#models').append(brand);
                        }else {
                            $('#models').empty();
                            swal({
                                    title: "Are you sure?",
                                    text: "You will not be able to recover this imaginary file!",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Yes, delete it!",
                                    cancelButtonText: "No, cancel plx!",
                                    closeOnConfirm: false,
                                    closeOnCancel: false
                                },
                                function(isConfirm){
                                    if (isConfirm) {
                                        // swal("Go Another Route!", "Your imaginary file has been deleted.", "success");
                                        window.location.href = response.redirect ;
                                    } else {
                                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                                    }
                                });
                        }
                        
                    },
                    error : (error) => {
                        console.log(error);
                    }
                });
            }) ;
        });
    </script>
@endsection 