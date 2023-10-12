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
                    <td id="color">{{$info->color}}</td>
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
    <script src="{{asset('storage/Jquery/car_info.js')}}"></script>
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
                                    <select class="form-select form-select-md mb-3" id="divertrim">
                                        ${response['divertrimes'].map(divertrim => `
                                            <option value="${divertrim.divertrim}" ${divertrim.divertrim == data.divertrim ? 'selected' : ''}>${divertrim.divertrim}</option>    
                                        `).join('')}
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="camera" class="form-label">Camera</label>
                                    <select class="form-select form-select-md mb-3" id="camera">
                                        ${response['cameraes'].map(camera => `
                                            <option value="${camera.camera}" ${camera.camera == data.camera ? "selected" : ''}>${camera.camera}</option>    
                                        `).join('')}
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="seat_leather" class="form-label">Seat</label>
                                    <select class="form-select form-select-md mb-3" id="seat_leather">
                                        ${response['seats'].map(seat => `
                                            <option value="${seat.seat}" ${seat.seat == data.seat_leather ? 'selected' : ''}>${seat.seat}</option>    
                                        `).join('')}
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="transmission" class="form-label">Transmission</label>
                                    <select class="form-select form-select-md mb-3" id="transmission">
                                    ${response['transmissions'].map(transmission => {
                                            const numericPart = transmission.transmission.match(/^(\d+)/);
                                            const optionValue = numericPart ? numericPart[1] : '';
                                            return `
                                                <option value="${optionValue}" ${optionValue === data.transmission ? 'selected' : ''}>
                                                    ${transmission.transmission}
                                                </option>
                                            `;
                                        }).join('')}
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="sonar" class="form-label">Sonar</label>
                                    <select class="form-select form-select-md mb-3" id="sonar">
                                        ${response['sonors'].map(sonor => `
                                            <option value="${sonor.sonor}" ${sonor.sonor == data.sonor ? 'selected' : ''}>${sonor.sonor}</option>    
                                        `).join('')}
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="sun_roof" class="form-label">Sun Roof</label>
                                    <select class="form-select form-select-md mb-3" id="sun_roof">
                                        ${response['sun_roofs'].map(sunRoof => `
                                            <option value="${sunRoof.sun_roofs}" ${sunRoof.sun_roofs == data.sun_roof ? 'selected' : ''}>${sunRoof.sun_roofs}</option>    
                                        `).join('')}
                                    </select>
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
                                        <div class="mb-1.5">
                                            <input class="form-check-input" type="checkbox" value="auto_headlight" id="auto_headlight" ${Boolean(data.auto_headlight) ? 'checked' : ' '}>
                                            <label class="form-check-label" for="auto_headlight">
                                                Auto Head Light
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
                                        <select class="form-select form-select-md mb-3" id="key">
                                            ${response['keys'].map(key => `
                                                <option value="${key.key}" ${key.key == data.key ? "selected" : '' }>${key.key}</option>    
                                            `).join('')}
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="engine " class="form-label">Engine</label>
                                        <select class="form-select form-select-md mb-3" id="engine">
                                            ${response['engines'].map(engine => `
                                                <option value="${engine.engine_power}" ${engine.engine_power == data.engine ? 'selected' : ""}>${engine.engine_power}</option>    
                                            `).join('')}
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="exterior_color" class="form-label">Exterior Color</label>
                                        <select class="form-select form-select-md mb-3" id="exterior_color">
                                            ${response['exterior_colors'].map(exterior_color => `
                                                <option value="${exterior_color.exterior_color}" ${exterior_color.exterior_color == data.exterior_color ? "selected" : ''}>${exterior_color.exterior_color}</option>    
                                            `).join('')}
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="body_style" class="form-label">Body Style</label>
                                        <select class="form-select form-select-md mb-3" id="body_style">
                                            ${response['body_styles'].map(body_style => `
                                                <option value="${body_style.body_style}" ${body_style.body_style == data.body_style ? "selected" : ''}>${body_style.body_style}</option>    
                                            `).join('')}
                                        </select>
                                    </div>
                                </div>
                            </div> `;
                        let modal_footer = `
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" id="save" class="btn btn-primary" data-id='${id}'>Save</button>
                        `;
                        $('.modal-footer').html(modal_footer);
                        $('#modal_label').html(modal_title);
                        $('.modal-body').html(modal_header);
                        $('#view').modal('show');
                    },
                    error : (errorData) => {
                        console.log(errorData);
                    }
                });
            }));
            $(document).on('click','#save',(e)=> {
                    let saveBtn = $(e.currentTarget);
                    let id = saveBtn.data('id');
                    let lincese = $('input[name="lincese"]').val();
                    let grade = $('input[name="grade"]').val();
                    let kilo = $('input[name="kilo"]').val();
                    let key = $('#key').val();
                    let camera  =$('#camera').val();
                    let engine = $('#engine').val();
                    let sonar = $('#sonar').val();
                    let transmission = $('#transmission').val();
                    let seat = $('#seat_leather').val();
                    let sun_roof = $('#sun_roof').val();
                    let divertrim = $('#divertrim').val();
                    let abs = $('#abs').prop('checked') ? true : false ;
                    let auto_em_b = $('#auto_em_b').prop('checked') ? true : false ;
                    let auto_hold = $('#auto_hold').prop('checked') ? true : false ;
                    let blind_sprot = $('#blind_sprot').prop('checked') ? true : false ;
                    let kick_sensor = $('#kick_sensor').prop('checked') ? true : false ;
                    let tire_pressure = $('#tire_pressure').prop('checked') ? true : false ;
                    let truck_motor = $('#truck_motor').prop('checked') ? true : false ;
                    let lane_keep_assit = $('#lane_keep_assit').prop('checked') ? true : false ;
                    let rain_sensor = $('#rain_sensor').prop('checked') ? true : false ;
                    let rounded_ac = $('#rounded_ac').prop('checked') ? true : false ;
                    let auto_headlight = $('#auto_headlight').prop('checked') ? true : false ;
                    let streeing_volume = $('#streeing_volume').prop('checked') ? true : false ;
                    let exterior_color = $('#exterior_color').val();
                    let body_style = $('#body_style').val();
                    
                    $.ajax({
                        method : "PUT" ,
                        url : "/admin/update-info/" + id ,
                        data : {
                            "_token" : "{{csrf_token()}}" ,
                            'enigne' : engine ,
                            'streeing_volume' : streeing_volume,
                            'lincese' : lincese ,
                            'grade' : grade ,
                            'kilo' : kilo ,
                            'auto_headlight' : auto_headlight ,
                            'rounded_ac' : rounded_ac ,
                            'rain_sensor' : rain_sensor ,
                            'lane_keep_assit' : lane_keep_assit ,
                            'truck_motor' : truck_motor ,
                            'blind_sprot' : blind_sprot ,
                            'auto_hold' : auto_hold ,
                            'abs' : abs ,
                            tire_pressure : tire_pressure ,
                            'auto_em_b' : auto_em_b ,
                            'divertrim' : divertrim ,
                            'sun_roof' : sun_roof ,
                            'seat' : seat ,
                            'camera' : camera ,
                            'transmission' : transmission ,
                            'sonar' : sonar ,
                            'key' : key ,
                            'kick_sensor' : kick_sensor ,
                            'exterior_color' : exterior_color ,
                            'body_style' : body_style ,
                        },
                        success : (res) => {
                            swal({
                                title: "Alert",
                                text: res,
                                timer: 2000
                            });
                        },
                        error : (err ) => {
                            console.log(err );
                        }
                    });
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