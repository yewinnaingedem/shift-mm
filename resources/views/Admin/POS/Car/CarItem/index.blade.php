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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carItems as $carItem)
                <tr>
                    <td>{{$carItem->model_name}}</td>
                    <td>{{$carItem->license_plate}}</td>
                    <td>{{$carItem->grade}}</td>
                    <td>{{$carItem->vin}}</td>
                    <td>{{$carItem->created_at}}</td>
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
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
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
            $(document).on('click','.delete' , (e)=>{
                let $deleteBtn = $(e.currentTarget);
                let $id = $deleteBtn.data('id');
                let $row = $deleteBtn.parent().parent();
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
                            type : 'delete',
                            url : '/admin/cars/' + $id ,
                            data : {
                                '_token' : '{{csrf_token()}}',
                            },
                            success : (res) => {
                                $row.remove();
                                swal("Deleted!", res, "success");
                            },
                            error : (err) => {
                                swal("Deleted!", err.message , "success");
                            }
                        });    
                        
                    });
            });
        });
    </script>
@endsection 