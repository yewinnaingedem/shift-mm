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
            <a href="{{url('admin/mechanic/create')}}" class=" btn btn-primary">
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
        <table id="example" class="display rounded mt-3" style="width:100%  ; background : #212529 ; color : white ;">
        <thead>
            <tr>
                <th class="text-center">Car Id</th>
                <th>Mechanic Name</th>
                <th>Phone Number</th>
                <th>Type</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($machines as $machine)
            <tr>
                <td class="text-center">{{$machine->id}}</td>
                <td>{{$machine->name}}</td>
                <td class="position-relative hoverEffect">
                    <div class="w-100 fw-bold phoneID">
                        {{$machine->phone}}
                    </div>
                    <div class="position-absolute h-100 customize d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-copy copyIcon"></i>
                    </div>
                </td>
                <td>{{$machine->category}}</td>
                <td class="text-center">
                    <li class="nav-item  list-style-none">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <i class="fa-solid fa-list"></i>
                        </a>
                        <ul class="dropdown-menu ">
                            <li>
                                <a class="dropdown-item" href="#">View</a>
                                
                            </li>
                            <li >
                                <button class="dropdown-item delete" data-id="{{$machine->id}}">Delete</button>
                            </li>
                        </ul>
                    </li>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center" >Car Id</th>
                <th>Mechanic Name</th>
                <th>Phone Number</th>
                <th>Type</th>
                <th class="text-center" >Action</th>
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
        });
    </script>
@endsection 