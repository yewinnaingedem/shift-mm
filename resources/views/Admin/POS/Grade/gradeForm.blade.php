@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
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
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    @vite('resources/js/VueForm/app.js')
@endsection 