@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Add Car')

@section('content')
    <!-- <pre>{{$car_infos}}</pre> -->
    <div class="container  d-flex justify-content-center aligin-items-center">
        <div class="card mt-5" style="width: 500px;">
            <h3 class="header text-center mt-3 ">Car Details </h3>
            <div class="card-body row mb-3">
                <div class="col-md-6 mb-2 d-flex justify-content-center align-items-center">
                    <div>Blind Sport</div>
                </div>
                <div class="col-md-6 mb-3">
                    <button class="btn btn-primary">Ture</button>
                </div>
                <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center">
                    <div>Blind Sport</div>
                </div>
                <div class="col-md-6 mb-3">
                    <button class="btn btn-primary">Ture</button>
                </div>
                <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center">
                    <div>Blind Sport</div>
                </div>
                <div class="col-md-6 mb-3 ">
                    <button class="btn btn-primary">Ture</button>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div>Blind Sport</div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary">Ture</button>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div>Blind Sport</div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary">Ture</button>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div>Blind Sport</div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary">Ture</button>
                </div>
            </div>
        </div>
    </div>

@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
   
@endsection 