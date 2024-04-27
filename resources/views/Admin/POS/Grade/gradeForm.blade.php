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
       <App :datas="{{json_encode($datas)}}"></App>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    @vite('resources/js/VueForm/app.js')
@endsection 