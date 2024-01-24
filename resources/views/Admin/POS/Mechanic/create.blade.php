@extends('Admin.Layout.app')

@section('title' , 'Defaulu Functions')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3 pt-3" >
        <div class="mb-2 ">
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>A well-known quote, contained in a blockquote element.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Someone famous in <cite title="Source Title">Source Title</cite>
                </figcaption>
            </figure>
        </div>
        <form action="{{url('admin/mechanic')}}"  method="post">
            @csrf 
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="function" class="fw-bold form-label">Mechanic Name</label>
                    <input type="text" class="form-control" value="{{old('name')}}" placeholder="Enter Mechanic Name" name="name">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif 
                </div>
                <div class="col-md-6">
                    <label for="function" class="fw-bold form-label">Phone Number</label>
                    <input type="number" class="form-control" value="{{old('phoneNumber')}}" placeholder="Enter Phone Number" name="phoneNumber">
                    @if($errors->has('phoneNumber'))
                        <p class="text-danger">{{$errors->first('phoneNumber')}}</p>
                    @endif 
                </div>
            </div>
            <div class="mb-3">
                <label for="sepcialize" class="form-label">Sepcialize</label>
                <select class="form-select" name="sepcialize" id="sepcialize">
                    @foreach($sepcializes as $sepcialize)
                        <option value="{{$sepcialize->id}}">{{$sepcialize->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 ">
                    <a href="{{url('admin/license-state')}}" class="btn btn-primary mb-3">
                        <i class="fa-sharp fa-solid fa-backward"></i>
                        <span>Back </span>
                    </a>
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-primary">Sumbit</button>
                </div>
            </div>
        </form>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script>
        $(document).ready(()=>{
            var $focusIn = $('input[name="function"]');
            $focusIn.focus();
        });
    </script>
@endsection 