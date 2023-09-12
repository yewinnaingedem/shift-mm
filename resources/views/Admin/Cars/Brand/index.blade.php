@extends('Admin/Layout/app')

@section('title' , 'Brand')


@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .button-font{
            font-size : normal  ;
        }
        .mr-3 {
            margin-right : 5px ;
        }
    </style>
@endsection 

@section('sidebar')
    @parent 
@endsection 

@section('navbar')
    @parent 
@endsection 
@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{url('admin/brands/create')}}" class="btn btn-primary button-font"><span class="ms-lg">Create New One </span> <i class="fa-regular fa-square-plus"></i></a>
        </div>    
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Brand Name</th>
                    <th>Brand Make</th>
                    <th>Model </th>
                    <th>Name </th>
                    <th>Created At </th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
            @foreach($datas as $data )
                <tr>
                    <td>{{$data->brand_name}}</td>
                    <td>{{$data->make}}</td>
                    <td>{{$data->model}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->created_at}}</td>
                    <td class="d-flex justity-conten-between align-items-center">
                        <a href="{{url('admin/brands/'.$data->id)}}" class="text-primary mr-3"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{url('admin/brands/'.$data->id.'/edit')}}" class=""><i class="fa-solid fa-file-pen"></i></a>
                        <button class="text-danger btn delete" data-id="{{$data->id}}"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Brand Name</th>
                    <th>Brand Make</th>
                    <th>Model </th>
                    <th>Created At </th>
                    <th>Updated At</th>
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
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(()=> {
            new DataTable('#example');
            $('.delete').click((e) => {
                let btn = $(e.currentTarget) ;
                let id = btn.data('id') ;
                let row = btn.parent().parent() ;

                $.ajax({
                    type : "DELETE" ,
                    url : '/admin/brands/' + id ,
                    data : {
                        "_token" : "{{csrf_token()}}"
                    },
                    success : (res) => {
                        console.log(res);
                        row.remove();
                    },
                    error : (err ) => {
                        console.log(err);
                    }
                });
            })
        });
    </script>
@endsection 