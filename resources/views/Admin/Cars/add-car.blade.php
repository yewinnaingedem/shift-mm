@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    @vite('resources/js/app.js')
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Add Car')

@section('content')
    <div id="add">
        <addcars/>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')

@endsection 