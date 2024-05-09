@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .p-10 {
            padding : 5px 10px ;
        }
        .btn-sold {
            text-decoration : none ;
            color : #0f0b0b ;
            font-weight : 300 ;
            letter-spacing : 0.5px ;
            background-color : #f6f6f6 ;
            padding : 6px 10px;
            outline : none ;
            border : 1px solid black ;
            border-radius : 5px ;
            text-transform : capitalize  ;
        }
        .header-color {
            color : #06CBA3 ;
            letter-spacing : 0.7px ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container-fluid mt-3">
        <div class="content-header text-center ">
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Mingalar Car Sale Center With Salling Management </p>
                </blockquote>
            </figure>
        </div>
        <hr>
        <div class="row">
            @if(count($sales) != 0) 
                @foreach($sales as $sale )
                <div class="col-md-4 mb-3">
                    <div class="card shadow">
                        <div class="card-header">
                             <div class="text-center">
                                <div class="header-color fw-semibold ">{{$sale->company_name}} </div>
                             </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Currently Selling: </h5>
                            <ul>
                                <li class="row">
                                    <div class="col-md-4">
                                        <span>Car</span>
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-7">
                                        <span>{{$sale->brand_name}}</span>    
                                        <span>{{$sale->model_name}}</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-md-4">
                                        <span>License </span>
                                    </div>    
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-7">
                                        <span class="me-2">{{$sale->license_plate}}</span>
                                        <span class="fw-semibold">({{$sale->license_state}})</span>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-md-4">
                                        <span>Price </span>
                                    </div>    
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-7">
                                        <span class="editable" data-id="{{$sale->main_id}}"> {{$sale->price}}</span>
                                    </div>
                                </li>
                                <li class="row " >
                                    <div class="col-md-4">
                                        <span>Sale Date </span>
                                    </div>    
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-7 cursor-pointer ">
                                        <span >{{$sale->sale_date}}</span>
                                    </div>
                                </li>
                            </ul>
                            <p class="card-text">This car is now available for sale. Please take a look and manage accordingly.</p>
                        </div>
                        <div class="card-footer ">
                            <div class="text-end">
                                <a href="{{url('admin/sold_out/'.$sale->main_id)}}" class="btn btn-info">Sold Out</a>
                            </div>
                        </div>
                    </div>        
                </div>
                @endforeach
            @else 
                <!--  message alert  -->
                <div class="mb-3">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Warning!</h4>
                        <p>There is no car in the salling page <strong>Make Sure to add the car into car sell list </strong> </p>
                        <hr>
                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                    </div>
                </div>
            @endif 
        </div>
    </div>
    
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script>
        $(document).ready(()=> {
            $(document).on('click','.delete' ,((e)=> 
                {
                    let deleteBtn = $(e.currentTarget);
                    let id = deleteBtn.data('id') ;
                    let row = deleteBtn.parent().parent();
                    swal({
                        title: "Are you sure?",
                        text: "This item will automotivcally move to sell table",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                        },
                        function(){
                            swal("Deleted!", 'response' , "success");
                            $.ajax({
                                type : 'delete' ,
                                url : "/admin/car_sells/"+ id,
                                data : {
                                    "_token" : "{{csrf_token()}}"
                                },
                                success : (response) => 
                                {
                                    console.log(response);
                                    row.remove();
                                },
                                error : (error) => {
                                    console.log(error);
                                }
                            });
                    });
                }
            ));
            $(document).on('dblclick','.editable',function (e) {
                var row = $(e.currentTarget) ;
                var getId = row.data('id');
                var id = 'editedId'+ getId ;
                var input = $(this).text();
                var textarea = (value , id ) => {
                    return ` <input type="text" value="${value}" id="${id}" name="price" class="w-100">`
                } ;
                row.html(`${textarea(input , id)}`);
                $('#'+id).focus();
                $('#'+id).blur(function () {
                    var $value = $(this).val();
                    if($value !== '') {
                        $.ajax({
                            type : "PUT" ,
                            url : "/admin/car_sells/" + getId ,
                            data : {
                                '_token' : "{{csrf_token()}}" ,
                                'pirce' : $value
                            },
                            success : (response) => {
                                if(response.state_code == 304 ) {
                                  return "Sorry" ;
                                }
                                return  row.html($value);
                            },
                            error : (error) => {
                                console.log(error);
                            }
                        });
                    }else {
                        row.html('fuck');
                    }
                    
                });
                $('#' + id).keypress(function (e) {
                    if (e.which === 13) {
                        $(this).blur();
                    }
                });
            });
            
        });
    </script>
@endsection 