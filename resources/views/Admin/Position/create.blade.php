@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3" >
        <a href="{{url('admin/positions/create')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Add New </span>
        </a>
        <form action="{{url('admin/positions')}}"  method="post">
            @csrf 
            <div class="mb-3">
                <label for="role" class="form-label">Position Role</label>
                <input type="text" name="role" id="role" placeholder="Enter Position Role" class="form-control" value="{{old('role')}}">
                @if($errors->has('role'))
                    <p class="text-dagner">{{$errors->first('role')}}</p>
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