@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
            * {
                margin: 0;
                padding: 0;
            }

            html {
                height: 100%;
            }

            /*Background color*/
            #grad1 {
                background-color: : #9C27B0;
            }

            /*form styles*/
            #msform {
                text-align: center;
                position: relative;
                margin-top: 20px;
            }

            #msform fieldset .form-card {
                background: white;
                border: 0 none;
                border-radius: 0px;
                box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
                padding: 20px 40px 30px 40px;
                box-sizing: border-box;
                width: 94%;
                margin: 0 3% 20px 3%;

                /*stacking fieldsets above each other*/
                position: relative;
            }

            #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 0.5rem;
                box-sizing: border-box;
                width: 100%;
                margin: 0;
                padding-bottom: 20px;

                /*stacking fieldsets above each other*/
                position: relative;
            }

            /*Hide all except first fieldset*/
            #msform fieldset:not(:first-of-type) {
                display: none;
            }

            #msform fieldset .form-card {
                text-align: left;
                color: #9E9E9E;
            }

            #msform input, #msform textarea {
                padding: 0px 8px 4px 8px;
                border: none;
                border-bottom: 1px solid #ccc;
                border-radius: 0px;
                margin-bottom: 25px;
                margin-top: 2px;
                width: 100%;
                box-sizing: border-box;
                font-family: montserrat;
                color: #2C3E50;
                font-size: 16px;
                letter-spacing: 1px;
            }

            #msform input:focus, #msform textarea:focus {
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
                border: none;
                font-weight: bold;
                border-bottom: 2px solid skyblue;
                outline-width: 0;
            }

            /*Blue Buttons*/
            #msform .action-button {
                width: 100px;
                background: skyblue;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 0px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
            }

            #msform .action-button:hover, #msform .action-button:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
            }

            /*Previous Buttons*/
            #msform .action-button-previous {
                width: 100px;
                background: #616161;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 0px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
            }

            #msform .action-button-previous:hover, #msform .action-button-previous:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
            }

            /*Dropdown List Exp Date*/
            select.list-dt {
                border: none;
                outline: 0;
                border-bottom: 1px solid #ccc;
                padding: 2px 5px 3px 5px;
                margin: 2px;
            }

            select.list-dt:focus {
                border-bottom: 2px solid skyblue;
            }

            /*The background card*/
            .card {
                z-index: 0;
                border: none;
                border-radius: 0.5rem;
                position: relative;
            }

            /*FieldSet headings*/
            .fs-title {
                font-size: 25px;
                color: #2C3E50;
                margin-bottom: 10px;
                font-weight: bold;
                text-align: left;
            }

            /*progressbar*/
            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                color: lightgrey;
            }

            #progressbar .active {
                color: #000000;
            }

            #progressbar li {
                list-style-type: none;
                font-size: 12px;
                width: 25%;
                float: left;
                position: relative;
            }

            /*Icons in the ProgressBar*/
            #progressbar #account:before {
                font-family: FontAwesome;
                content: "\f023";
            }

            #progressbar #personal:before {
                font-family: FontAwesome;
                content: "\f007";
            }

            #progressbar #payment:before {
                font-family: FontAwesome;
                content: "\f09d";
            }

            #progressbar #confirm:before {
                font-family: FontAwesome;
                content: "\f00c";
            }

            /*ProgressBar before any progress*/
            #progressbar li:before {
                width: 50px;
                height: 50px;
                line-height: 45px;
                display: block;
                font-size: 18px;
                color: #ffffff;
                background: lightgray;
                border-radius: 50%;
                margin: 0 auto 10px auto;
                padding: 2px;
            }

            /*ProgressBar connectors*/
            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: lightgray;
                position: absolute;
                left: 0;
                top: 25px;
                z-index: -1;
            }

            /*Color number of the step and the connector before it*/
            #progressbar li.active:before, #progressbar li.active:after {
                background: skyblue;
            }

            /*Imaged Radio Buttons*/
            .radio-group {
                position: relative;
                margin-bottom: 25px;
            }

            .radio {
                display:inline-block;
                width: 204;
                height: 104;
                border-radius: 0;
                background: lightblue;
                box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
                box-sizing: border-box;
                cursor:pointer;
                margin: 8px 2px; 
            }

            .radio:hover {
                box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
            }

            .radio.selected {
                box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
            }

            /*Fit image in bootstrap div*/
            .fit-image{
                width: 100%;
                object-fit: cover;
            }
            .w-80 {
                width : 80% ;
            }
            .checkbox_customize {
                appearance : none ;
                display : none ;
            }
            .p-10 {
                padding : 10px ;
                background : black ;
                color : white ;
                border-radius : 4px ;
            }
            .text-left{
                text-align : left ;
            }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Grade')

@section('content')
    <div class="container mt-3">
        <a href="{{url('admin/seat')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/seat/'.$seat->id)}}" method="post">
            @csrf 
            @method('put')
            <input type="hidden" name="id" value="{{$seat->id}}">
            <div class="mb-3">
                <label for="seat" class="form-label">Seat Conditon Update</label>
                <input type="text" name="seat" id="seat" value="{{old('seat' , $seat->seat)}}" class="form-control">
                @if($errors->has('seat'))
                    <p class="text-danger">{{$errors->first('seat')}}</p>
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