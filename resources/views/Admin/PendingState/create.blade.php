@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')

@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div id="app">
        <Panding :panding="{{json_encode($panding)}}" />
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    @vite('resources/js/Panding/panding.js')
@endsection 