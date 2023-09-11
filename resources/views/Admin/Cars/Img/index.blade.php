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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    
@endsection 