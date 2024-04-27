@extends('Admin.Layout.app')

@section('title' , 'Defaulu Functions')

@section('style')
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3" >
        <a href="{{url('admin/function')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/function')}}"  method="post">
            @csrf 
            <div class="mb-3">
                <label for="function" class="form-label">Function</label>
                <input type="text" class="form-control" value="{{old('car_model')}}" placeholder="Enter Car Model" name="function">
                @if($errors->has('function'))
                    <p class="text-danger">{{$errors->first('function')}}</p>
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
            var $focusIn = $('input[name="function"]');
            $focusIn.focus();
        });
    </script>
@endsection 