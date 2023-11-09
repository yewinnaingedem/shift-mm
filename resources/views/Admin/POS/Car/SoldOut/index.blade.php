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
                    <label class="form-label" for="origin_price">Saled Price</label>
                    <input type="number" class="form-control" name="purchase_price" placeholder="Enter Saled Price">
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
            <div class="bg-dark rounded ">
                <div class="row pt-3 w-50 m-auto" >
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" >HP</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100">Cash</button>
                    </div>
                </div>
                <div class="hp-content">
                    <div class="main">
                            
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
                }else {
                    $brokerName.prop('disabled',false);
                    $lenghtYear.prop('disabled',false);
                }
            });
            $(document).on('change',$forBroker , () => {
                if($forBroker.prop('checked')){
                    $('#broker').removeClass('d-none');
                }else {
                    $('#broker').addClass('d-none');
                }
            });
        });
    </script>
@endsection 