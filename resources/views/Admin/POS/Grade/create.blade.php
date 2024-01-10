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
            @if(session('modelX'))
                @php 
                    $modelX = session()->get('modelX');
                @endphp 
                    <input type="hidden" name="modelX[model]" value="{{$modelX['model']}}">
                    <input type="hidden" name="modelX[year]" value="{{$modelX['year']}}">
                    <input type="hidden" name="modelX[make]" value="{{$modelX['make']}}">
                    <input type="hidden" name="modelX[test]" value="TRUE">
                @else
                <input type="hidden" name="modelX[test]" value="FALSE">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="grade">Brand Name</label>
                    <select name="brand" id="brand" class="form-select">
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}"
                            @if(session()->has('model')) 
                                {{ session()->get('model') == $brand->id ? 'selected' : ' ' }}
                            @endif
                            >
                                {{$brand->brand_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="models" class="form-label">Add Model</label>
                    <select class="form-select" name="model" id="models" aria-label="Disabled select example" >
                        <option slected>Chose Model</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Car Model</label>
                <input type="text" class="form-control" value="{{old('grade')}}" {{ $errors->has('grade') ? 'disabled' : '' }} placeholder="Enter Car Model" name="grade" >
                @if($errors->has('grade'))
                    <p class="text-danger">{{$errors->first('grade')}}</p>
                @endif 
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" {{ $errors->has('grade') ? 'checked' : '' }}  type="checkbox" role="switch" value="exist" id="gradeValide">
                <label class="form-check-label" for="gradeValide">Does it have grade ?</label>
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
                    type : "post" ,
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
                    type : "post" ,
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