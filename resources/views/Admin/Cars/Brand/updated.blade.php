@extends('Admin/Layout/app')

@section('title' , 'Admin || Show')


@section('style')
   <style>
        .w-full {
            width : 100% ;
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
    <div class="d-flex justify-content-start align-items-start mb-3"> 
        <a href="{{url('admin/brands')}}" class="btn btn-info">
            <i class="fa-solid fa-backward"></i> 
            <span>Back</span>  
        </a>
    </div>
        
@endsection

@section('script')
    
@endsection 