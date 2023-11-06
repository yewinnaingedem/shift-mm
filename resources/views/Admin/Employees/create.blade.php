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
            <a href="{{url('admin/employees')}}" class="btn btn-primary mb-3">
                <i class="fa-sharp fa-solid fa-backward"></i>
                <span>Back </span>
            </a>
            <div class="d-flex justify-content-around align-items-center">
                <div class="h2 ">
                    Create the Employee Role 
                </div>
            </div>
        <form action="{{url('admin/employees')}}"  method="post">
            @csrf 
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Enter Name">
                @if($errors->has('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label class="form-check-label" for="email">Email</label>
                <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email">
                @if($errors->has('email'))
                    <p class="text-danger">{{$errors->first('email')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Enter Phone" id="phone" >
                @if($errors->has('phone'))
                    <p class="text-danger">{{$errors->first('phone')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position </label>
                <input type="text" class="form-control" name="position" value="{{old('position')}}" placeholder="Enter Position" id="position" >
                @if($errors->has('position'))
                    <p class="text-danger">{{$errors->first('position')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age </label>
                <input type="number" class="form-control" name="age" value="{{old('age')}}" placeholder="Enter Age" id="age" >
                @if($errors->has('age'))
                    <p class="text-danger">{{$errors->first('age')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}"  >
                @if($errors->has('start_date'))
                    <p class="text-danger">{{$errors->first('start_date')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" name="salary" value="{{old('salary')}}" placeholder="Enter Salary" id="salary" >
                @if($errors->has('salary'))
                    <p class="text-danger">{{$errors->first('salary')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Sumbit</button>
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
        });
    </script>
@endsection 