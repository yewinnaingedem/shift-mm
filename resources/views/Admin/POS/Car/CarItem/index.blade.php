@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Item')

@section('content')
<div class="container mt-3">
    <table id="carItem" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Brand Name</th>
                <th>Licens Plate</th>
                <th>Grade </th>
                <th>VIN</th>
                <th>Created At</th>
                <th>Sale</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carItems as $carItem)
                <tr>
                    <td>{{$carItem->model_name}}</td>
                    <td>{{$carItem->license_plate}}</td>
                    <td>
                        @php 
                            $active = 'bg-info' ;
                            $default = 'bg-primary';
                        @endphp
                        <div
                            class="rounded text-center {{  $carItem->grade == '0' ? 'bg-danger' : 'bg-primary fw-bold' }} " 
                        >
                        {{$carItem->grade === '0' ? 'none': $carItem->grade   }}
                        </div>
                    </td>
                    <td class="fst-italic fw-bolder">{{$carItem->vin}}</td>
                    <td>{{$carItem->created_at}}</td>
                    <td>
                    @php
                        $found = false; // Variable to track if the item has been found
                    @endphp

                    @foreach($saledItems as $saledItem)
                        @if($carItem->car_id === $saledItem->car_id)
                            <button class="btn btn-info">Selling</button>
                            @php
                                $found = true; // Set the found variable to true
                                break; // Exit the loop
                            @endphp
                        @endif
                    @endforeach

                    @if (!$found)
                        <button class="btn btn-info saling" data-id="{{ $carItem->car_id }}">Sell</button>
                        <!-- <button type="button" class="btn btn-primary" data-id="{{$carItem->car_id}}" data-bs-toggle="modal" data-bs-target="#sell" data-bs-whatever="@mdo">Sell</button> -->
                    @endif
                        
                    </td>
                    <td>
                        <button class="btn btn-danger delete" data-id="{{$carItem->car_id}}">Delete</button>
                        <a href=""
                            class="btn btn-primary"
                        >
                            View
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        <tfoot>
            <tr>
                <th>Brand Name</th>
                <th>Licens Plate</th>
                <th>Grade </th>
                <th>VIN</th>
                <th>Created At</th>
                <th>Sale</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="sell" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('')}}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mingalar Car Sale Center</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="price" class="col-form-label">Price:</label>
                        <input type="number" class="form-control" id="price" placeholder="Enter Price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Price</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(()=> {
            new DataTable('#carItem');
            // $(document).on('click','.delete' , (e)=>{
            //     let $deleteBtn = $(e.currentTarget);
            //     let $id = $deleteBtn.data('id');
            //     let $row = $deleteBtn.parent().parent();
            //     swal({
            //         title: "Are you sure?",
            //         text: "You will not be able to recover this imaginary file!",
            //         type: "warning",
            //         showCancelButton: true,
            //         confirmButtonColor: "#DD6B55",
            //         confirmButtonText: "Yes, delete it!",
            //         closeOnConfirm: false
            //         },
                    
            //         function(){
            //             $.ajax({
            //                 type : 'delete',
            //                 url : '/admin/cars/' + $id ,
            //                 data : {
            //                     '_token' : '{{csrf_token()}}',
            //                 },
            //                 success : (res) => {
            //                     $row.remove();
            //                     swal("Deleted!", res, "success");
            //                 },
            //                 error : (err) => {
            //                     swal("Deleted!", err.message , "success");
            //                 }
            //             });    
                        
            //         });
            // });
            
            $(document).on("click",'.saling',(e)=>{
                let $sell = $('.sell-item');
                let $sellEvent = $(e.currentTarget);
                let $sellId = $sellEvent.data('id');
                console.log('hi');
            });
        });
    </script>
@endsection 