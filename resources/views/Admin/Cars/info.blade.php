@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet"  href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <style> 
        .mr-3 {
            margin-right : 5px ;
        }
        .mb-1.5 {
            margin-bottom : 1.5px ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Add Car')

@section('content')
<div class="mt-3 ">
    <table id="example" class="table text-center  table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Year</th>
                <th>Modal Name</th>
                <th>Color</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($car_infos as $info )
                <tr class="text-capitalize">
                    <td>{{$info->name}}</td>
                    <td>{{$info->year}}</td>
                    <td>{{$info->modal}}</td>
                    <td>{{$info->color}}</td>
                    <td>
                        <button class="btn btn-danger delete" data-id="{{$info->main_id}}">
                            Delete
                        </button>
                        <button  class="btn show-data btn-primary" id='show' data-id="{{$info->main_id}}" >
                            View
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Brand</th>
                <th>Year</th>
                <th>Modal Name</th>
                <th>Color</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Card -->
<div class="modal fade" id="view" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_label">
                    
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="save" class="btn btn-primary">Save</button>
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
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script>
        $(document).ready(()=>{
            new DataTable('#example');
            $('.view').click((e)=>{
                let btn = $(e.currentTarget);
                let id = btn.data('id');
                let row = btn.parent().parent();

                $.ajax({
                    type : "post" ,
                    url : "/admin/car-info", 
                    data : {
                        "_token" : "{{csrf_token()}}",
                        id : id ,
                    },
                    success : (resp) => {
                        console.log(resp );
                    },
                    error : (err ) => {
                        console.log(err);
                    }
                });
            });
            $(document).on('click','#show',((event)=> {
                let viewBtn = $(event.currentTarget);
                let id = viewBtn.data('id');
                $.ajax({
                    type : 'post' ,
                    url : "/admin/car-info/"+ id ,
                    data : {
                        "_token" : "{{csrf_token()}}"
                    },
                    success : (response) => {
                        let title = response['car_data'] ;
                        let data = response['car_infos'] ;
                        let modal_title = 
                        `   
                        <div class="d-flex justify-content-between align-items-center">
                            <div class='mr-3'>${title.year} </div>
                            <div class='mr-3 fw-bolder'>/ ${title.brand_name} /</div>
                            <div>${title.modal_name}</div>
                        </div>
                        `;
                        let modal_header = `
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="lincese" class="form-label">License</label>
                                <input type="text" name="lincese" id="lincese" value="${data.license}" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="kilo" class="form-label">Kilo</label>
                                <input type="text" name="kilo" id="kilo" value="${data.millage}" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="grade" class="form-label">Grade</label>
                                <input type="text" name="grade" id="grade" value="${data.trim == 1 ? "Doesn't have Grade" : data.trim }" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="divertrim" class="form-label">Divertrim</label>
                                <input type="text" name="divertrim" id="divertrim" value="${data.divertrim}" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="camera" class="form-label">Camera</label>
                                <input type="text" name="camera" id="camera" value="${data.camera}" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="seat_leather" class="form-label">Seat</label>
                                <input type="text" name="seat_leather" id="seat_leather" value="${data.seat_leather}" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="transmission" class="form-label">Transmission</label>
                                <input type="text" name="transmission" id="transmission" value="${data.transmission}" class="form-control">
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="abs"  id="abs" ${Boolean(data.abs) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="abs">
                                            A B S 
                                        </label>
                                    </div>
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox"  value="auto_em_b" id="auto_em_b" ${Boolean(data.auto_em_b) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="auto_em_b">
                                            Auto Emergency Breake
                                        </label>
                                    </div>
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="auto_hold"  id="auto_hold" ${Boolean(data.auto_hold) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="auto_hold">
                                            Auto Hold
                                        </label>
                                    </div>
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="blind_sprot" id="blind_sprot" ${Boolean(data.blind_sprot) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="blind_sprot">
                                            Blind Sport 
                                        </label>
                                    </div>
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="kick_sensor" id="kick_sensor" ${Boolean(data.kick_sensor) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="kick_sensor">
                                            Kick Sensor
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6" > 
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="tire_pressure" id="tire_pressure" ${Boolean(data.tire_pressure) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="tire_pressure">
                                            Tire Pressure
                                        </label>
                                    </div>
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="truck_motor"  id="truck_motor" ${Boolean(data.truck_motor) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="truck_motor">
                                            Truck Motor
                                        </label>
                                    </div>
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="lane_keep_assit"  id="lane_keep_assit" ${Boolean(data.lane_keep_assit) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="lane_keep_assit">
                                            Lane Keep Assit 
                                        </label>
                                    </div>
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="rain_sensor"  id="rain_sensor" ${Boolean(data.rain_sensor) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="rain_sensor">
                                            Rain Sensor
                                        </label>
                                    </div>
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="rounded_ac" id="rounded_ac" ${Boolean(data.rounded_ac) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="rounded_ac">
                                            Rounded AirCon
                                        </label>
                                    </div>
                                    <div class="mb-1.5">
                                        <input class="form-check-input" type="checkbox" value="streeing_volume" id="streeing_volume" ${Boolean(data.streeing_volume) ? 'checked' : ' '}>
                                        <label class="form-check-label" for="streeing_volume">
                                            Streeing Volume
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-2">
                                    <label for="key" class="form-label">Key</label>
                                    <input type="text" name="key" id="key" value="${data.key}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="engine " class="form-label">Engine</label>
                                    <input type="text" name="engine" id="engine" value="${data.engine}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="exterior_color" class="form-label">exterior_color</label>
                                    <input type="text" name="exterior_color" id="exterior_color" value="${data.exterior_color}" class="form-control">
                                </div>
                            </div>
                        </div>
                        `;
                        $('#modal_label').html(modal_title);
                        $('.modal-body').html(modal_header);
                        $('#view').modal('show');
                    },
                    error : (errorData) => {
                        console.log(errorData);
                    }
                });
                
            }));
            $(document).on('click','#save',()=> {
                let key = $('input[name="key"]').val();
                let engine = $('input[name="engine"]').val();
                let lincese = $('input[name="lincese"]').val();
                let grade = $('input[name="grade"]').val();
                let kilo = $('input[name="kilo"]').val();
                let divertrim = $('input[name="divertrim"]').val();
                let camera = $('input[name="camera"]').val();
                let seat_leather = $('input[name="seat_leather"]').val();
                let transmission = $('input[name="transmission"]').val();
                let exterior_color = $('input[name="exterior_color"]').val();
                let abs = $('#abs').prop('checked') ? true : false ;
                let auto_em_b = $('#auto_em_b').prop('checked') ? true : false ;
                let auto_hold = $('#auto_hold').prop('checked') ? true : false ;
                let blind_sprot = $('#blind_sprot').prop('checked') ? true : false ;
                let kick_sensor = $('#kick_sensor').prop('checked') ? true : false ;
                let tire_pressure = $('#tire_pressure').prop('checked') ? true : false ;
                let lane_keep_assit = $('#lane_keep_assit').prop('checked') ? true : false ;
                let rain_sensor = $('#rain_sensor').prop('checked') ? true : false ;
                let rounded_ac = $('#rounded_ac').prop('checked') ? true : false ;
                let streeing_volume = $('#streeing_volume').prop('checked') ? true : false ;
                console.log(abs , auto_em_b ,blind_sprot , kick_sensor , tire_pressure , lane_keep_assit , rain_sensor , rounded_ac , streeing_volume );
                // console.log(key , engine , lincese , grade ,kilo , divertrim , camera , seat_leather  , transmission , exterior_color );
            });
            $(document).on('click','.delete' , (e) => {
                let deleteBtn = $(e.currentTarget);
                let dataId = deleteBtn.data('id');
                let row = deleteBtn.parent().parent();
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                function(){
                    $.ajax({
                        type : "delete" ,
                        url : "/admin/car-info/" + dataId ,
                        data : {
                            "_token" : "{{csrf_token()}}"
                        },
                        success : (res) => {
                            row.remove();
                            swal("Deleted!", "Your imaginary file has been deleted."+ res , "success");
                        },
                        error : (err) => {
                            console.log(err);
                        }
                    });
                    
                });
                
            } )
        });
    </script>
@endsection 