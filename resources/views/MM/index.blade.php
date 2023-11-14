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
        $(document).ready(function () {
            // var $priceElement = $('.price');
            // if ($priceElement.length > 0) {
            //     var test = $priceElement.html();
            //     var val = parseFloat(test).toLocaleString(); // Assuming the content is a number
            //     $priceElement.html(val); // Update the content with the formatted value
            // }
            $('.price').each(function() {
                var $priceElement = $(this);
                var test = $priceElement.html();
                var val = parseFloat(test).toLocaleString(); // Assuming the content is a number
                $priceElement.html(val); // Update the content with the formatted value
            });

        });
    </script>
@endsection 