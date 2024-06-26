@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
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
   <!-- MultiStep Form -->
   <div class="row d-flex justify-content-center align-items-center h-80">
    <div class="col-md-8 col-md-offset-3">
        
        <form id="msform" action="{{url('admin/function/create')}}" method="post">
            <!-- progressbar -->
            @method('post')
            @csrf 
            <input type="hidden" name="id" value="{{$id}}">
            <ul id="progressbar" class="d-flex justify-content-center align-items-center">
                <li class="active">Function</li>
                <li>Basic</li>
                <li>Testing</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title text-center mb-3">Function Details </h2>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission"  class="form-label">Transmission</label>
                            <select class="form-select"  name="transmission">
                                @foreach($transmissions as $transmission)
                                    <option value="{{$transmission->id}}">{{$transmission->transmission}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission" class="form-label">Body Style </label>
                            <select class="form-select" name="body_style">
                                @foreach($bodyStyles as $bodyStyles)
                                    <option value="{{$bodyStyles->id}}">{{$bodyStyles->body_style}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission" class="form-label"> Engine  </label>
                            <select class="form-select" name="engine">
                                @foreach($engines as $engine)
                                <option value="{{ $engine->id }}">
                                    @php $isTurbo = $engine->Turbo @endphp
                                    {{ $engine->Engine_power . " " ."($engine->cylinder) " . ($isTurbo ? 'Turbo' : '') }}
                                </option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission" class="form-label">Key  </label>
                            <select class="form-select" name="key">
                                @foreach($keys as $key)
                                    <option value="{{$key->id}}">{{$key->key}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission" class="form-label">Divertrim  </label>
                            <select class="form-select" name="divertrim">
                                @foreach($divertrims as $divertrim)
                                    <option value="{{$divertrim->id}}">{{$divertrim->divertrim}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission" class="form-label">Sun Roof  </label>
                            <select class="form-select" name="sun_roof">
                                @foreach($sun_roofs as $sun_roof)
                                    <option value="{{$sun_roof->id}}">{{$sun_roof->sun_roof}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <input type="button" name="next" class="next action-button" value="Next"/>
                <a href="{{url('admin/grade/create')}}" class="previous ">
                    Quit 
                </a>
            </fieldset>
            <fieldset>
                <h2 class="fs-title text-center mb-3">Condition </h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission" class="form-label">Air Condition </label>
                            <select class="form-select" name="aircon">
                                @foreach($aircons as $aircon)
                                    <option value="{{$aircon->id}}">{{$aircon->aircon}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission" class="form-label">Sonar </label>
                            <select class="form-select" name="sonar">
                                @foreach($sonars as $sonar)
                                    <option value="{{$sonar->id}}">{{$sonar->sonar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission" class="form-label">Seats Condition </label>
                            <select class="form-select" name="seat">
                                @foreach($seats as $seat)
                                    <option value="{{$seat->id}}">{{$seat->seat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 text-left">
                            <label for="transmission" class="form-label">Truck Motor </label>
                            <select class="form-select" name="motor">
                                @foreach($motors as $motor)
                                    <option value="{{$motor->id}}">{{$motor->motor}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title text-center mb-3"> Addtional Fucture</h2>
                <div class="row">
                    @foreach($functions as $function)
                        <div class="col-md-4">
                            <label for="{{$function->id}}" class="p-10 d-flex align-items-center justify-content-center mb-3 testing" data-id="{{$function->id}}">
                                <input type="checkbox" id="{{$function->id}}"  value="{{$function->id}}" name="functions[{{$function->function}}]" class="checkbox_customize" >
                                <div>
                                    {{$function->function}}
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="action-button" value="Submit"/>
                
            </fieldset>
        </form>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script>
        $(document).ready(function(){
                var current_fs, next_fs, previous_fs; //fieldsets
                var opacity;
                $(".next").click(function(){
                    
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                    
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    
                    //show the next fieldset
                    next_fs.show(); 
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
                
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                        }, 
                        duration: 600
                    });
                });
                $(".previous").click(function(){
                    
                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();
                    
                    //Remove class active
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                    
                    //show the previous fieldset
                    previous_fs.show();
                
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
                
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            previous_fs.css({'opacity': opacity});
                        }, 
                        duration: 600
                    });
                });
                $('.radio-group .radio').click(function(){
                    $(this).parent().find('.radio').removeClass('selected');
                    $(this).addClass('selected');
                });
                $(".submit").click(function(){
                    return false;
                });
                $(document).on('change', '.testing', (e) => {
                    const target = $(e.currentTarget);
                    const data = target.data('id');
                    const childEle = target.find('.checkbox_customize');
                    const isChecked = childEle.prop('checked');
                    if(isChecked) {
                        target.addClass('bg-info');
                    }else {
                        target.removeClass('bg-info');
                    }
                });
                $(document).on('change' , '.transmisssion' , (e) => {

                });
            });
    </script>
@endsection 