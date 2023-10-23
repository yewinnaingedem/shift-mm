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
        <a href="{{url('admin/sun_roof')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/sun_roof')}}"  method="post">
            @csrf 
            <div class="mb-3">
                <label for="sun_roof" class="form-label">Sun Roof </label>
                <input type="text" name="sun_roof" id="sun_roof" placeholder="Add Sun Roof" class="form-control" value="{{old('sun_roof')}}">
                @if($errors->has('sun_roof'))
                    <p class="text-danger">{{$errors->first('sun_roof')}}</p>
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
@endsection 