@extends('Admin/Layout/app')

@section('title' , 'Admin || Show')


@section('style')
   <style>
        .w-full {
            width : 100% ;
        }
        .text-white{
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
        <div class="d-flex justify-content-start align-items-start mb-3"> 
            <a href="{{url('admin/brands')}}" class="btn btn-info">
                <i class="fa-solid fa-backward"></i> 
                <span>Back</span>  
            </a>
        </div>
        <table class="w-full ">
            <tr class="mb-3">
                <td>Brand Name</td>
                <td class="bg-primary text-center">{{$data->brand_name}}</td>
            </tr>
            <tr class="mb-3">
                <td>Brand Model</td>
                <td class="bg-primary text-center">{{$data->model}}</td>
            </tr>
            <tr class="mb-3">
                <td>Brand Make</td>
                <td class="bg-primary text-center">{{$data->make}}</td>
            </tr>
            <tr class="mb-3">
                <td> Name</td>
                <td class="bg-primary text-center">{{$data->name}}</td>
            </tr>
        </table>
    </div>
@endsection

@section('script')
    
@endsection 