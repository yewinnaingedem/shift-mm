@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3">
        <table id="myTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>License Plate</th>
                    <th>Buyer</th>
                    <th>HP Plan</th>
                    <th>Loan Length</th>
                    <th>bought At</th>
                    <th>Purchase</th>
                    <th>Print</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                <tr>
                    <td>
                        <span>{{$record->licensePlate}}</span>
                        <span class="fw-bold text-secondary ">/ {{$record->modelName}}</span>
                    </td>
                    <td class="text-capitalize">{{$record->buyerName}}</td>
                    <td>{{$record->hpPlan}}</td>
                    <td class="loanLenght">{{$record->loanMonths}}</td>
                    <td>{{$record->createdAt}}</td>
                    <td>{{$record->purchasePrice}}</td>
                    <td>
                        <a href="" class="btn btn-primary">
                            <span class="fw-lighter me-1">PDF </span>
                            <i class="fa-solid fa-print"></i>
                        </a>
                    </td>
                </tr>   
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>License Plate</th>
                    <th>Buyer</th>
                    <th>HP Plan</th>
                    <th>Loan Length</th>
                    <th>bought At</th>
                    <th>Purchase</th>
                    <th>Print</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(() => {
            $('#myTable').DataTable( {
                autoFill: true ,
                responsive: true
            } );
            let loanLenght  = $('.loanLenght');
            loanLenght.each(function (index , element ) {
                let getAmount = $(element).text().trim();
                let years = getAmount / 12 ;
                $(element).text(years + " years");
            });
        });
    </script>
@endsection 