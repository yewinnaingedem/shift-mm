@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Grade')

@section('content')
    <div class="container mt-3">
        <a href="{{url('admin/key')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/key/'.$key->id)}}" method="post">
            @csrf 
            @method('put')
            <input type="hidden" name="id" value="{{$key->id}}">
            <div class="mb-3">
                <label for="key" class="form-label">Seat Conditon Update</label>
                <input type="text" name="key" id="key" value="{{old('key' , $key->key)}}" class="form-control">
                @if($errors->has('key'))
                    <p class="text-danger">{{$errors->first('key')}}</p>
                @endif
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    @parent 
@endsection 

@section('script')
    
@endsection 