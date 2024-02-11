@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .fs-18 {
            font-size : 18px ;
        }
        .right-0 {
            right : 0px; 
        }
        .w-30 {
            width : 31% ;
        }
        .hover-element {
            opacity: 0;
            background : transparent ;
        }
        .card {
            cursor: pointer;
        }
        .card:hover .hover-element {
            opacity: 1;
            transition : 0.3s ease ;
        }
        .text-tomato {
            color : tomato ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Fixer')

@section('content')
    <div class="contianer my-3">
        <div class="box-header text-center my-3">
            <div class="fw-bold text-center h2 ">
                This is the panding state of machines
            </div>
        </div>
        <div class="box-container">
            <div class="row">
                @foreach($machines as $machine)
                    <div class="col-md-6 mb-3">
                        <div class="card overflow-hidden shadow bg-secondary fw-semibold text-white fs-18">
                            <div class="card-body row position-relative">
                                <div class="col-md-8">
                                    <figure>
                                        <blockquote class="blockquote">
                                            <p>{{$machine->name}} , <span class="fw-bold">{{$machine->category}}</span></p>
                                        </blockquote>
                                        <figcaption class="blockquote-footer text-tomato">
                                            Someone phone <cite title="phone number" class="text-black">{{$machine->phone}}</cite>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-md-4 text-end d-flex justify-content-center align-items-center">
                                    <div class="fw-bold text-warning">
                                        {{ $machine->pending_count == null ?  'no car is panding' : $machine->pending_count . " car is panding"}}
                                    </div>
                                </div>
                            </div>
                            <div class="position-absolute hover-element d-flex w-30 right-0  h-100 bg-success justify-content-center align-items-center top-0 ">
                                <div class="fw-bold font-monospace">
                                    <a href="{{url('admin/details/'.$machine->specialize.'/'.$machine->name)}}" class="text-decoration-none">
                                        Check More..
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    
@endsection 