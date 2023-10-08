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
                <tr>
                    <td>{{$info->name}}</td>
                    <td>{{$info->year}}</td>
                    <td>{{$info->modal}}</td>
                    <td>{{$info->color}}</td>
                    <td>
                        <button class="btn btn-primary view" data-id="{{$info->main_id}}">
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
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="view" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal_label"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
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
                        $('#view').modal('show');
                    },
                    error : (errorData) => {
                        console.log(errorData);
                    }
                });
                
                // $('#view').modal('show');
            }));
        });
    </script>
@endsection 