@extends('Admin.Layout.app')

@section('title' , 'Defaulu Functions')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3 pt-3" >
        <form action="{{url('admin/license-state')}}"  method="post">
            @csrf 
            <div class="mb-3">
                <label for="function" class="fw-bold form-label">License State</label>
                <input type="text" class="form-control" value="{{old('state')}}" placeholder="Enter License State" name="state">
                @if($errors->has('state'))
                    <p class="text-danger">{{$errors->first('state')}}</p>
                @endif 
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 ">
                    <a href="{{url('admin/license-state')}}" class="btn btn-primary mb-3">
                        <i class="fa-sharp fa-solid fa-backward"></i>
                        <span>Back </span>
                    </a>
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-primary">Sumbit</button>
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