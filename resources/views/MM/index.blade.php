@extends('MM.Layout.app')

@section('title' , 'Shop MM ') 
@section('style')
    <style>
        .font-dispaly{
            color : #06CBA3 ;
        }
    </style>
@endsection 
@section('nav-bar')
    @parent 
@endsection 

@section('content') 
    @include('MM.Layout.content')
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script>
        
    </script>
@endsection 