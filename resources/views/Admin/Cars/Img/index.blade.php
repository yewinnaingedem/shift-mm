@extends('Admin/Layout/app')

@section('title' , 'Img')


@section('style')
    <style>
        .add-button {
            padding : 10px 20px ;
            border-radius : 10px ;
        }
        a {
            text-decoration : none ;
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
    <div class="content-wrapper">
        <h1 class="text-center text-info text-lg mb-2">Car Imgaes</h1>
        <div class="mb-3">
            <a href="{{url('admin/imgs/create')}}" class="add-button bg-primary mb-2 text-white">
                Add <span class="text-lg"> + </span>
            </a>
        </div>
        @if(session()->has('message'))
            <h2 class="text-info">{{session()->get('message')}}</h2>
        @endif
        <table class="table table-info rounded ">
            <thead class="text-center bg-secondary">
                <tr>
                    <th>Images Font</th>
                    <th>Imgaes Back</th>
                    <th>Imgage Side 1</th>
                    <th>Images Side 2 </th>
                    <th>Interior</th>
                    <th>Kilo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image )
                    <tr>
                        <td>   
                            <img style="width: 100px; height: 100px; " src="{{asset('storage/'. $image->font )}}" alt="font">    
                        </td>
                        <td>   
                            <img style="width: 100px; height: 100px; " src="{{asset('storage/'. $image->east )}}" alt="font">    
                        </td>
                        <td>   
                            <img style="width: 100px; height: 100px; " src="{{asset('storage/'. $image->side_1 )}}" alt="font">    
                        </td>
                        <td>   
                            <img style="width: 100px; height: 100px; " src="{{asset('storage/'. $image->side_2 )}}" alt="font">    
                        </td>
                        <td>   
                            <img style="width: 100px; height: 100px; " src="{{asset('storage/'. $image->interior )}}" alt="font">    
                        </td>
                        <td>   
                            <img style="width: 100px; height: 100px; " src="{{asset('storage/'. $image->kilo )}}" alt="font">    
                        </td>
                        <td>
                            <a href="{{url('admin/imgs/'.$image->id)}}" class="text-primary mr-2"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{url('admin/imgs/'.$image->id.'/edit')}}">update</a>
                            <button class="text-danger btn delete" data-id="{{$image->id}}"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.delete').click((e)=> {
                let button = $(e.currentTarget);
                let id = button.data('id');
                let row = button.parent().parent() ;
                $.ajax({
                    type  : "DELETE" ,
                    url : "/admin/imgs/" + id ,
                    data : {
                        "_token" : "{{csrf_token() }}"
                    },
                    success : (response) => {
                        console.log(response);
                    },
                    error : function (err)  {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endsection 