@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container-fluid mt-3">
        <div class="mb-3">
            <a href="{{url('admin/car_sells')}}" class=" btn btn-primary">
                <i class="fa-solid fa-plus">Add</i>
                <span>Add New</span>
            </a>
        </div>
        @if(session('message')) 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {{ session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif 
        
            
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Car Number </th>
                    <th>Buyer Name</th>
                    <th>Employee Name</th>
                    <th>Hp Loan</th>
                    <th>Broker Name</th>
                    <th>Saled At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($saled_cars as $saled)
                    <tr>
                        <td> {{ $saled->number_plate}}</td>
                        <td> {{ $saled->name}}</td>
                        <td>{{ $saled->employee }}</td>
                        <td>{{$saled->hp_loan}}</td>
                        @php 
                            $broker = $saled->broker_name ;
                            $test = $broker == null ? TRUE : FALSE ;
                        @endphp 
                        <td class="fw-bold text-center {{ $test ? 'bg-dark text-white' : '' }}">{{ $test ? 'None' : $broker}}</td>
                        <td>{{$saled->created_at}}</td>
                        <td>
                            <li class="nav-item  list-style-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <i class="fa-solid fa-list"></i>
                                </a>
                                <ul class="dropdown-menu ">
                                    <li>
                                        <a href="{{url('admin/saled/'. $saled->id .'/edit')}}" class="dropdown-item">View & Update </a>
                                    </li>
                                    <li >
                                        <button class="dropdown-item delete" data-id="{{$saled->id}}">Delete</button>
                                    </li>
                                </ul>
                            </li>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Car Number </th>
                    <th>Buyer Name</th>
                    <th>Employee Name</th>
                    <th>Hp Loan</th>
                    <th>Broker Name</th>
                    <th>Saled At</th>
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
    <script>
        $(document).ready(()=> {
            new DataTable('#example');
            $(document).on('click','.delete' ,((e)=> 
                {
                    let deleteBtn = $(e.currentTarget);
                    let id = deleteBtn.data('id') ;
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
                            swal("Deleted!", 'response' , "success");
                            $.ajax({
                                type : 'delete' ,
                                url : "/admin/sonar/" + id ,
                                data : {
                                    "_token" : "{{csrf_token()}}"
                                },
                                success : (response) => 
                                {
                                    row.remove();
                                },
                                error : (error) => {
                                    console.log(error);
                                }
                            });
                            row.remove() ;
                    });
                }
            ));
        });
    </script>
@endsection 