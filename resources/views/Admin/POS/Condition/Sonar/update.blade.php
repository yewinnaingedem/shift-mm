@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Grade')

@section('content')
    <div class="container mt-3">
        <a href="{{url('admin/sonar')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/sonar/'.$sonar->id)}}" method="post">
            @csrf 
            @method('put')
            <input type="hidden" name="id" value="{{$sonar->id}}">
            <div class="mb-3">
                <label for="sonar" class="form-label">Sonar Update</label>
                <input type="text" name="sonar" id="sonar" value="{{old('sonar' , $sonar->sonar)}}" class="form-control">
                @if($errors->has('sonar'))
                    <p class="text-danger">{{$errors->first('sonar')}}</p>
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