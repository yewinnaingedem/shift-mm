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
        <a href="{{url('admin/sonar')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/sonar')}}"  method="post">
            @csrf 
            <div class="mb-3">
                <label for="sonar" class="form-label">Sonar</label>
                <input type="text" name="sonar" id="sonar" placeholder="Add Sonar" class="form-control" value="{{old('sonar')}}">
                @if($errors->has('sonar'))
                    <p class="text-danger">{{$errors->first('sonar')}}</p>
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