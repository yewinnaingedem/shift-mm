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
    @if(session('message')) 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {{ session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif 
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
                    <td id="model_name">{{$carItem->model_name}}</td>
                    <td id="licensePlate">{{$carItem->license_plate}}</td>
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
                        $found = false; 
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
                        <button id="modalId"  class="btn btn-primary" data-id="{{$carItem->car_id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Sell
                        </button>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{url('admin/car_sells')}}" method="post">
            @csrf 
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mingalar Car Sale Center </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="sumbit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
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
            $(document).on('click','#modalId',(e)=> {
                var $modalId = $(e.currentTarget);
                var $data = $modalId.data('id');
                var $modelName = $modalId.parent().parent().find("#model_name").html();
                var $licensePlate = $modalId.parent().parent().find("#licensePlate").html();
                let $modelContent = `
                        <input type="hidden" name="id" value="${$data}">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price For <span class="text-danger fw-bold">${$modelName}</span ><span class="fw-bold">(${$licensePlate})</span></label>
                            <input type="number" name="price" id="price" placeholder="Enter Price" class="form-control">
                        </div>
                `;
                $('.modal-body').html($modelContent);
            });

            var $price = $('input[name="price"]');
            // $(document).on('onchange',$price , ()=> {
            //     console.log($price.val());
            // });
            console.log($price);
        });
    </script>
@endsection 