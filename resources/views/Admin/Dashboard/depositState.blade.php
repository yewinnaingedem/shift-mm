@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
        .sale-agreement {
            line-height: 1.6;
        }
        .h-133 {
            height: 133px;
            overflow: hidden;
        }
        .object-contain {
            object-fit : contain ;
        }
        .carousel-inner {
            width : 70% ;
            margin : 0 auto ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-2">
        <blockquote class="blockquote text-center">
            <p class="fw-semibold">This is the Deposit Panding State</p>
        </blockquote>
        
        <div class="panding-container">
            day : hour : minutes : second 
        </div>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    
@endsection 