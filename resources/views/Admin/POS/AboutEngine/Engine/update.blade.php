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
        <a href="{{url('admin/camera')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/camera/'.$camera->id)}}" method="post">
            @csrf 
            @method('put')
            <input type="hidden" name="id" value="{{$camera->id}}">
            <div class="mb-3">
                <label for="camera" class="form-label">Sonar Update</label>
                <input type="text" name="camera" id="camera" value="{{old('camera' , $camera->camera)}}" class="form-control">
                @if($errors->has('camera'))
                    <p class="text-danger">{{$errors->first('camera')}}</p>
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