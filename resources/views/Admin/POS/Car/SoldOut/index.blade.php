@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style> 
        .p-10 {
            padding : 10px ;
        }
        .p-customize {
            padding : 0px 15px ;
        }
        .overflow-hidden {
            overflow: hidden;   
        }
        .loading-bar {
            position: relative;
            top: 0;
            display: none;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: transparent;
            border-radius : 15px ;
            overflow: hidden;
        }
        .loading-bar--active::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 30%;
            height: 4px;
            background-color: #ff5151;
            animation: moveLoadBar 2s cubic-bezier(0.09, 0.89, 0.7, 0.71) infinite;
        }

        @keyframes moveLoadBar {
            0% {
                left: -10%;
            }
            100% {
                left: 110%;
            }
        }
        .m-0 {
            margin-bottom : 0px  !important ;
        }
        .min-height {
            min-height : 400px ;
        }
        .bg-cute {
            background-color: #f6f6f6 ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3 p-3 rounded shadow-lg bg-cute">
        <form action="{{url('admin/sold_out')}}" method="post">
            @csrf 
            <div class=" row">
                <div class="col-md-9">
                    <p class="h3 text-muted font-monospace">Mingalar Car Sale Center </p>
                </div>
                <div class="col-md-3 text-end">
                    <select name="employee" class="form-select select-valid " width="50%" >
                        <option selected class="d-none">Who sell it ?</option>
                        
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->full_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <input type="hidden" name="id" value="{{$id}}">
            <div class="row">
                <div class="col-md-6">
                    <label for="dealer" class="form-label">Dealer</label>
                    <select name="dealer" class="form-select select-valid " width="50%" >
                        <option selected class="d-none">Dealer</option>
                        @foreach($dealers as $dealer)
                            <option value="{{$dealer->id}}">{{$dealer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="buyer" class="form-label">Buyer Name</label>
                    <input type="text" class="form-control check-valid" name="buyer" placeholder="Enter Buyer Name">
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
                    <input type="text" name="purchase_price" id="purchase" class="form-control check-valid" placeholder="Enter Purchase Price">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="origin_price">Phone Number</label>
                    <input type="number" class="form-control check-valid" name="phone_number" placeholder="Enter Phone Number ">
                </div>
                    <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Enter Address</label>
                    <textarea class="form-control check-valid" name="address" value="{{old('address')}}" id="address" rows="" placeholder="Enter Address"></textarea>
                </div>
            </div>
            <div class="bg-dark rounded overflow-hidden mb-3">
                <div class="card text-center">
                    <div class="card-header">
                        <button type="button" id="hp" class="btn btn-dark">HP</button>
                        <button type="button"  id="cash" class="btn btn-dark">Cash</button>
                    </div>
                    <div  class="card-body min-height">
                        <div id="hp-content">
                            <div class="row mb-2">
                                <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                    <label class="form-label "  for="hp">Loan Plan</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="hp" id="hp" class="form-select  select-valid">
                                                <option class="d-none" selected>Enter Loan Plan</option>
                                                @foreach($hps as $hp)
                                                    <option value="{{$hp->id}}">{{$hp->hp_loan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="present" value="50" class="form-control check-valid bg-dark text-white" placeholder="Enter Parsent">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 dpAmount">
                                <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                    <label class="form-label" for="hp">Downpayment <span id="dpPresent" class="fw-bold"></span></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="downpayment" class="form-control fw-bold" placeholder="Enter Downpayment">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                    <label class="form-label" for="hp">Insurance (<span class="fw-bold" id="insurance">1.5%</span>)</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="insurance" placeholder="Enter Insurance">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                    <label class="form-label" for="hp">Bank Commission <span class="fw-bold">( <span id="bankCommission">1%</span> on Loan Amount )</span></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="bankCommission" placeholder="Enter Bank Commission">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                                    <label class="form-label" for="hp">Service Charge <span class="fw-bold">( <span id="serviceCharge">2%</span> on Car Price )</span> </label>
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
                                            <input type="text" class="form-control   fw-bold" name="loanamount" placeholder="Enter Loan Lenght">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="monthly"  value="60" class="form-control   bg-dark text-white fw-bold" placeholder="Enter Months Only">
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
                        <div id="cash-content">
                            <p>Hi I am cash content</p>
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
                    <input type="text" name="broker[broker_phone]" id="brokerPhone" class="form-control" placeholder="Enter Broker Phone Number">
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
                <div class="col-md-6 text-end btn-width mb-3">
                    <button type="button" class="btn btn-primary " id="clickCheck" >
                        Sumbit
                    </button>
                </div>
            </div>
        </form>
        <!-- Bootstrap Modal  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content overflow-hidden">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="loading-bar loading-bar--active"></div>
                    <div class="modal-body">
                        <form action="" method="post">
                            @csrf 
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="deposit" class="form-label">Deposit Amount</label>
                                        <input type="text"  id="deposit" placeholder="Enter Deposit" class="form-control model-valid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Final Date</label>
                                    <input type="date" name="finalDate" class="form-control model-valid" placeholder="Enter Final Deposit" id="finalDate">
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control"  placeholder="Leave a comment here" style="height: 100px;" id="noted"></textarea>
                                <label for="noted">Need To Fixed </label>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3 row p-customize">
                        <div class="col-md-6 text-start ">
                            <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-primary" id="submit">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script src="{{asset('storage/admin/js/sold-out.js')}}"></script>
    <script>
            $(document).ready(()=> {
                $('#clickCheck').click(function() {
                    var checkValue = true; 
                    $('.check-valid').each(function (index, element) {
                        var value = $(element).val().trim();
                        if (value === "") {
                            $(element).addClass('is-invalid');
                            $(element).focus();
                            $(element).next('.error-message').remove();
                            let errorText = $(element).attr('placeholder');
                            checkValue = false;
                            var errorMessage = $('<p>').addClass('error-message m-0 text-danger fst-italic').text(`Please ${errorText}`);
                            $(element).after(errorMessage);
                        } else {
                            $(element).removeClass('is-invalid');
                            $(element).next('.error-message').remove();
                        }
                });
                $('.select-valid').each(function (index , element ) {
                    let select = $(element).val().trim();
                    if(select === "Who sell it ?" || select === "Enter Loan Plan" || select === "Dealer") {
                        $(element).addClass('is-invalid');
                        $(element).focus();
                        checkValue = false ;
                    }else {
                            $(element).removeClass('is-invalid');
                        }
                    });

                    if (checkValue) {
                        $('#exampleModal').modal('show');
                    } else {
                        $('#exampleModal').modal('hide');
                    }
                });
                let employee = $('select[name="employee"]') ;
                let buyer = $('input[name="buyer"]');
                let purchase_price = $('input[name="purchase_price"]');
                let phone_number = $('input[name="phone_number"]');
                let address = $('textarea[name="address"]');
                let hp = $('select[name="hp"]');
                let id = $('input[name="id"]');
                let present = $('input[name="present"]');
                let insurance = $('#insurance').text().trim();
                let bankCommission = $('#bankCommission').text().trim();
                
                let serviceCharge = $('#serviceCharge').text().trim() ;
                let monthly = $('input[name="monthly"]') ;
                let broker_name = $('#broker_name');
                let broker_fee = $('#broker_fee');
                let brokerPhone = $('#brokerPhone');
                let dealer = $('select[name="dealer"]');
                
                $('#submit').click(()=> {
                    let depositAmount = depositValue.val().replace(/,/g,'')
                    let finalDate = $('#finalDate');
                    let noted = $('#noted');
                    if(validation()) {
                        let deposit = 0 ;
                        if(present.val() < 50) {
                            deposit = $('#depositAmount').text().trim();
                        }
                        $('.loading-bar').show();
                        $.ajax({
                            url : "/admin/adminTesting" ,
                            method : "post" ,
                            data : {
                                'id' : id.val() ,
                                "_token" : "{{csrf_token()}}" ,
                                'depositAmount' : depositAmount  ,
                                'finalDate' : finalDate.val() ,
                                'noted' : noted.val() ,
                                'employee' : employee.val() ,
                                'monthly' : monthly.val() ,
                                'buyer' : buyer.val() ,
                                'purchase_price' : purchase_price.val() ,
                                'phone_number' : phone_number.val() ,
                                'address' : address.val() ,
                                'hp' : hp.val() ,
                                'present' : present.val() ,
                                'deposit' : deposit ,
                                'insurance' : insurance ,
                                'bankCommission' : bankCommission ,
                                'serviceCharge' : serviceCharge ,
                                'broker[name]' : broker_name.val() ,
                                'broker[broker_fee]' : broker_fee.val() ,
                                'broker[phone]' : brokerPhone.val() ,
                                'dealer' : dealer.val() ,
                            },
                            success : (response) => {
                                $('.loading-bar').hide();
                                window.location.href = response.redirect ;
                            },
                            error : (error) => {
                                console.log(error);
                            }
                        });
                    }
                });
                function validation () {
                    let modelValid = $('.model-valid');
                    var validateValue = true ;
                    modelValid.each(function (index , element) {
                        var value = $(element).val().trim();
                        if (value === "") {
                            $(element).addClass('is-invalid');
                            $(element).focus();
                            $(element).next('.error-message').remove();
                            let errorText = $(element).attr('placeholder');
                            validateValue = false;
                            var errorMessage = $('<p>').addClass('error-message m-0 text-danger fst-italic').text(`Please ${errorText}`);
                            $(element).after(errorMessage);
                        } else {
                            $(element).removeClass('is-invalid');
                            $(element).next('.error-message').remove();
                        }
                    });

                    return validateValue ;
                }

                let purchase = $('input[name="purchase_price"');
                $(purchase).on('keyup',function () {
                    let purchasePrice = $(this).val().replace(/,/g, '');
                    let formattedValue = Number(purchasePrice).toLocaleString();
                    let originPirce = $('input[name="price_of_ori"]').val();
                    $(this).val(formattedValue);
                    
                });
                
                let depositValue = $('#deposit');
                $(depositValue).on('keyup',function () {
                    let value = $(this).val().replace(/,/g,'');
                    let formattedValue = Number(value).toLocaleString();
                    $(this).val(formattedValue);
                });

                $("#hp-content").hide();

                // Show cash content when cash button is clicked
                $("#cash").click(function() {
                    $("#cash-content").toggle();
                    $("#hp-content").hide();
                });

                // Show hp content when hp button is clicked
                $("#hp").click(function() {
                        $("#hp-content").toggle();
                        $("#cash-content").hide();
                    });
                });
    </script>
@endsection 