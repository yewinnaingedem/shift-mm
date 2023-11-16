@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .yes-no {
            padding : 5px 15px;
            border : 1px solid black ;
            background : tomato ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3 bg-light pt-3" >
        <a href="{{url('admin/default-function')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/default-function')}}"  method="post">
            @csrf 
            <div class="">
                <p class="fw-bold"> Air Conditioniong</p>
                <div clas="">
                    <label for="ac_yes" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="ac" value="FALSE" id="ac_yes">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="ac_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="ac" value="TRUE" id="ac_no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <p class="fw-bold">Power Steering</p>
                <div clas="">
                    <label for="ps_yes" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="power_steering" value="FALSE" id="ac">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="ps_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="power_steering" value="TRUE" id="no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
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
            $('input[name="ac"]').on('change', function () {
                $('input[name="ac"]').parent().removeClass('bg-primary');
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('bg-primary');
                }
            });

        });
    </script>
@endsection 