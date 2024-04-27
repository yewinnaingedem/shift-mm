@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
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
        
        <form action="{{url('admin/camera')}}"  method="post">
            @csrf 
            <div class="mb-3">
                <label for="camera" class="form-label">Camera </label>
                <input type="text" name="camera" id="camera" placeholder="Add Camera" class="form-control" value="{{old('camera')}}">
                @if($errors->has('camera'))
                    <p class="text-danger">{{$errors->first('camera')}}</p>
                @endif 
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Sumbit</button>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{url('admin/camera')}}" class="btn btn-primary mb-3">
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
            
            $('#gradeValide').change(function ()
            {
                let $grade = $('input[name="grade"]');
                let $existGrade = $('#gradeValide');
                if($existGrade.prop('checked')){
                    $grade.prop('disabled' , true ).addClass('cursor-not-allowed');
                }else {
                    $grade.prop('disabled' , false).removeClass('cursor-not-allowed');
                }
            }
            );
        });
    </script>
@endsection 