@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3">
        <div class="text-center">
            <p class="h3">Mingalar Car Sale Center </p>
        </div>
        <form action="{{url('admin/sold_out')}}" method="post">
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
                    <input type="number" class="form-control" name="price_of_ori" placeholder="Enter Origin Price">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="origin_price">Saled Price</label>
                    <input type="number" class="form-control" name="purchase_price" placeholder="Enter Saled Price">
                </div>
                <div class="col-md-6 mb-3">
                    <label  for="hp_plan" class="form-label">HP Plan</label>
                    <select class="form-select" id="hp_plan" name="hp_plan">
                        @foreach($hps as $hp)
                            <option value="{{$hp->id}}">{{$hp->hp_loan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="origin_price">Downpayment</label>
                    <input type="text" class="form-control"  name="downpayment" placeholder="Enter Payment Amount">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="origin_price">Lenght Of Year</label>
                    <input type="text" class="form-control" name="lenght_year" placeholder="Enter Lenght Of Loan">
                </div>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="for_broker">
                <label class="form-check-label" for="for_broker">Does this customer with Broker ?</label>
            </div>
            <div class="row d-none" id="broker">
                <div class="col-md-6">
                    <label for="broker_name" class="form-label">Broker Name</label>
                    <input type="text" name="broker_name" id="broker_name" class="form-control" placeholder="Enter Broker Name">
                    @if($errors->has('broker_name'))
                        <p class="text-danger">{{$errors->first('broker_name')}}</p>
                    @endif 
                </div>
                <div class="col-md-6">
                    <label for="broker_fee" class="form-label">Broker Fee</label>
                    <input type="text" name="broker_fee" id="broker_fee" class="form-control" placeholder="Enter Broker Name">
                    @if($errors->has('broker_fee'))
                        <p class="text-danger">{{$errors->first('broker_fee')}}</p>
                    @endif 
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary">Save</button>
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
            let $hpPLan = $('#hp_plan');
            let $brokerName = $('input[name="downpayment"]');
            let $lenghtYear = $('input[name="lenght_year"]');
            let $forBroker = $('#for_broker');
            $(document).on('change',$hpPLan , ()=> {
                if($hpPLan.val() == 2) {
                    $brokerName.prop('disabled',true);
                    $lenghtYear.prop('disabled',true);
                }
            });
            $forBroker.change(function () {
                if($forBroker.prop('checked')){
                    $('#broker').removeClass('d-none');
                }else {
                    $('#broker').addClass('d-none');
                }
            });
        });
    </script>
@endsection 