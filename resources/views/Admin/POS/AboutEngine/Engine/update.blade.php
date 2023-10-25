@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .cursor-not-allowed {
            cursor : not-allowed ;
        }
        .text-start 
        {
            text-align : start ;
        }
        .mr-50 {
            margin-right : 50px ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Grade')

@section('content')
    <div class="container mt-3" >
        <a href="{{url('admin/engine')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/engine/'.$engine->id)}}"  method="post">
            @csrf 
            @method('put')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="engine_power" class="form-label">Engine Power CC</label>
                    <input type="number" name="Engine_power" id="engine_power" placeholder="Add Engine Power" class="form-control" value="{{old('Engine_power', $engine->Engine_power)}}" >
                    @if($errors->has('Engine_power'))
                        <p class="text-danger">{{$errors->first('Engine_power')}}</p>
                    @endif 
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cylinder" class="form-label">Cylinder</label>
                    <select class="form-select" name="Cylinder" >
                        @foreach($engine['cylinders'] as $cylinder) 
                            <option value="{{$cylinder->id}}" {{ $engine->Cylinder_id == $cylinder->id ? 'selected' : ''}}>{{$cylinder->cylinder}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="fuel" class="form-label">Fuel </label>
                    </div>
                    <div class="form-check col-md-6 form-switch mb-3 d-flex justify-content-end align-items-center ">
                        <label class="d-block mr-50" for="gradeValide">Does it have Trubo ?</label>
                        <input class="form-check-input" {{ $engine->Turbo ? 'checked' : ''}} type="checkbox" name="Turbo" role="switch" value="exist" id="gradeValide">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-select" name="Fuel" >
                                @foreach($engine['engine_types'] as $fuel) 
                                    <option value="{{$fuel->id}}" {{ $engine->Fuel == $fuel->id ? 'selected' : ''}}>{{$fuel->type}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="transmission_type" id="" class="form-select">
                            @foreach($engine['transmission_types'] as $transmission_type)
                                <option value="{{$transmission_type->id}}" {{ $engine->transmission_type == $transmission_type->id ? 'selected' : ''}}>{{$transmission_type->transmission_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Sumbit</button>
            </div>
        </form>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    
@endsection 