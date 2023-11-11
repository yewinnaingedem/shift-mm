@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style> 
        .p-10 {
            padding : 10px ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3">
        <form action="{{url('admin/sold_out')}}" method="post">
            @csrf 
            <div class=" row">
                <div class="col-md-9">
                    <p class="h3">Mingalar Car Sale Center </p>
                </div>
                <div class="col-md-3 text-end">
                    <select name="employee" class="form-select" width="50%" >
                        <option selected class="d-none">Who Sell This Car?</option>
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <input type="hidden" name="id" value="{{$id}}">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="buyer" class="form-label">Buyer Name</label>
                    <input type="text" class="form-control" name="buyer" placeholder="Enter Buyer Name">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif 
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="origin_price">Orgin Price</label>
                    <input type="number" class="form-control" value="{{old('price_of_ori',$salePrice->price)}}" name="price_of_ori" placeholder="Enter Origin Price">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="purchase">Saled Price</label>
                    <input type="number" name="purchase_price" id="purchase" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="origin_price">Phone Number</label>
                    <input type="number" class="form-control" name="phone_number" placeholder="Enter Phone Number">
                </div>
                    <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Enter Address</label>
                    <textarea class="form-control" name="address" value="{{old('address')}}" id="address" rows="2" placeholder="Enter Address"></textarea>
                </div>
            </div>
            <div class="bg-dark rounded overflow-hidden mb-3">
                <div class="card text-center">
                    <div class="card-header">
                        <button type="button" class="btn btn-dark">HP</button>
                        <button type="button" class="btn btn-dark">Cash</button>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                <label class="form-label "  for="hp">Loan Plan</label>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="hp" id="hp" class="form-select">
                                            <option class="d-none" selected>Enter Loan Plan</option>
                                            @foreach($hps as $hp)
                                                <option value="{{$hp->id}}">{{$hp->hp_loan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="present" value="50" class="form-control bg-dark text-white" placeholder="Enter Parsent">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2 dpAmount">
                            <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                <label class="form-label" for="hp">Downpayment</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="downpayment" class="form-control fw-bold" placeholder="Enter Downpayment">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                <label class="form-label" for="hp">Insurance</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="insurance" placeholder="Enter Insurance">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                <label class="form-label" for="hp">Bank Commission</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="bankCommission" placeholder="Enter Bank Commission">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                <label class="form-label" for="hp">Service Charge</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="serviceCharge" placeholder="Enter Service Charge">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                <label class="form-label" for="hp">Initial Payment</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="intial" class="form-control bg-dark text-white font-bold" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                <label class="form-label" for="hp">Loan Amount</label>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control fw-bold" name="loanamount" placeholder="Enter Loan Lenght">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="monthly"  value="60" class="form-control bg-dark text-white fw-bold" placeholder="Enter Months Only">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                <label class="form-label" for="hp">Monthly Payment</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="monthlyPayment"  placeholder="Enter Loan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="for_broker">
                <label class="form-check-label" for="for_broker">Does this customer with Broker ?</label>
            </div>
            <div class="row d-none" id="broker">
                <div class="col-md-6">
                    <label for="broker_name" class="form-label">Broker Name</label>
                    <input type="text" name="broker[name]" id="broker_name" class="form-control" placeholder="Enter Broker Name">
                    @if($errors->has('broker_name'))
                        <p class="text-danger">{{$errors->first('broker_name')}}</p>
                    @endif 
                </div>
                <div class="col-md-6">
                    <label for="broker_fee" class="form-label">Broker Fee</label>
                    <input type="text" name="broker[broker_fee]" id="broker_fee" class="form-control" placeholder="Enter Broker Name">
                    @if($errors->has('broker_fee'))
                        <p class="text-danger">{{$errors->first('broker_fee')}}</p>
                    @endif 
                </div>
                <div class="col-md-6">
                    <label for="broker_phone" class="form-label">Broker Phone</label>
                    <input type="text" name="broker[phone]" id="broker_fee" class="form-control" placeholder="Enter Broker Phone Number">
                    @if($errors->has('broker_phone'))
                        <p class="text-danger">{{$errors->first('broker_phone')}}</p>
                    @endif 
                </div>
            </div>
            <div class="mt-3 row" >
                <div class="col-md-6">
                    <a href="{{url('admin/car_sells')}}" class="btn btn-danger">
                        Go Back
                    </a>
                </div>
                <div class="col-md-6 text-end btn-width">
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
    <script src="{{asset('storage/admin/js/sold-out.js')}}"></script>
@endsection 