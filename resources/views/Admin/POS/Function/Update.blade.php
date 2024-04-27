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
        
        <form action="{{url('admin/function/'.$id)}}"  method="post">
            @method('put')
            @csrf 
            <div class="mb-3">
                <label for="function" class="form-label">Function</label>
                <input type="text" class="form-control" value="{{old('car_model', $details->function)}}" placeholder="Enter Car Model" name="function">
                @if($errors->has('function'))
                    <p class="text-danger">{{$errors->first('function')}}</p>
                @endif 
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Sumbit</button>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{url('admin/function')}}" class="btn btn-primary mb-3">
                        <i class="fa-sharp fa-solid fa-backward"></i>
                        <span>Back </span>
                    </a>
                </div>
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