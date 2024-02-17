<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF File For Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style> 
        .d-flex {
            display: flex;
        }
        .justify-content-center {
            justify-content : space-between ;
        }
        .align-items-center {
            align-items : center ;
        }
        .conclustion {
            width : 50% ;
            margin : 0 auto ;
        }
    </style>
</head>
<body>
    <div class="mt-3">  
        <div class="">
            <div class="page-header">
                <div class="text-center h2"> Mingalar Car Sale Center Report For {{$record->brandName}} {{$record->modelName}} <span>({{$record->licensePlate}})</span> </div>
            </div>
            <hr>
            <div class="ms-3">
                <div class="float-right" style="">
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li><strong>Customer:</strong> {{$record->buyerName}}</li>
                        <li><strong>Bought At:</strong> {{$record->createdAt}} </li>
                        <li><strong>Hp Plan:</strong> {{$record->HpLoan}}</li>
                    </ul>
                </div>
            </div>
            <div class="mr-3" style="font-family: Arial, sans-serif; font-size: 14px; line-height: 1.5; text-align: left;">
                <p style="margin-left: 20px;">
                    <span class="ms-3 fw-bold">This detailed </span>car report presents comprehensive insights into the {{$record->brandName}} {{$record->modelName}} {{$record->year}}, 
                        recently acquired by {{$record->buyerName}} from Mingalar Car Sale Center. The vehicle, identified by VIN ({{$record->vin}}) , boasts a mileage of {{$record->kilo_meter}} and is equipped with advanced features including 
                        @foreach($carFunctions as $carFunction)
                            {{$carFunction->function}}, 
                        @endforeach
                    technology.
                </p>
                <p class="mb-2" style="margin-left: 20px;">
                    <span class="ms-3 fw-bold">Despite</span> minor scratches on the rear bumper, the car is in excellent condition, having undergone regular servicing, with the most recent oil change performed 2 months ago and brake replacements completed 1 year ago. The vehicle holds a market value of {{$record->purchasePrice}} MMK.
                </p>
                <p class="mb-2" style="margin-left: 20px;">
                    <span class="ms-3 fw-bold">{{$record->buyerName}}'s</span> purchase was made possible through a comprehensive Hire Purchase ({{$record->HpLoan}}) plan , offered  by Mingalar Car Sale Center, with a {{$record->loanMonths}}-month loan term and a down payment of {{$record->downpayment}}, inclusive of insurance ({{$record->insurance}}), bank commission of {{$record->bank_commission}}, and service charge ({{$record->service_charge}}). This HP plan allows for manageable monthly payments over the agreed-upon period, ensuring affordability and convenience for the buyer.
                </p>
                <p style="margin-left: 20px;">
                    <span class="ms-3 fw-bold">Under</span> the guidance of Energy Plus dealership, the transaction process was seamless, with a guarantee of the car's quality and reliability. This comprehensive report, combined with the detailed HP plan, underscores transparency and instills confidence in {{$record->buyerName}}'s investment, promising a positive and satisfying purchasing experience.                    
                </p>
            </div>
            <div class="table ms-3">
                <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid #000; background-color: #f0f0f0;border-radius : 5px;">
                    <thead>
                        <tr style="background-color: #fff;">
                            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Purchase Price</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Downpayment (<span style="font-weight: bold;">{{$record->downpayment}}</span>)</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Deposit (<span style="font-weight: bold;">{{$record->downpayment}}</span>)</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Insurance (<span style="font-weight: bold;">{{$record->insurance}}</span>)</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Bank Commission (<span style="font-weight: bold;">{{$record->bank_commission}}</span>)</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Service Charge (<span style="font-weight: bold;">{{$record->service_charge}}</span>)</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Loan Amount (<span style="font-weight: bold;">{{$record->loanMonths}}</span>)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="text-align: center;">
                            <td style="border: 1px solid #000; padding: 8px;">{{$record->purchasePrice}}</td>
                            <td style="border: 1px solid #000; padding: 8px;">{{$hpPlan['downpaymentAmount']}}</td>
                            <td style="border: 1px solid #000; padding: 8px;">{{$hpPlan['deposit'] !== 0 ? $hpPlan['deposit'] : "---" }}</td>
                            <td style="border: 1px solid #000; padding: 8px;">{{$hpPlan['insurance']}}</td>
                            <td style="border: 1px solid #000; padding: 8px;">{{$hpPlan['bankcomission']}}</td>
                            <td style="border: 1px solid #000; padding: 8px;">{{$hpPlan['serviceCharge']}}</td>
                            <td style="border: 1px solid #000; padding: 8px;">----</td>
                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="5" style="border: 1px solid #000; padding: 8px;">Initial Paymenet</td>
                            <td style="border: 1px solid #000; padding: 8px;">{{$hpPlan['totalAmount']}}</td>
                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="5" style="border: 1px solid #000; padding: 8px;">Loan Amount</td>
                            <td style="border: 1px solid #000; padding: 8px;">{{$hpPlan['loanAmount']}}</td>
                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="5" style="border: 1px solid #000; padding: 8px;">Monthly Payment within {{$record->loanMonths}} months</td>
                            <td style="border: 1px solid #000; padding: 8px;">{{$hpPlan['emiAmount']}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mr-3" style="float: right; width: 45%;">
                <p style="font-family: Arial, sans-serif; font-size: 14px; line-height: 1.5; text-align: left;">
                    <span style="font-weight: bold;">Conclusion:</span> 
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li>Sing : <span class="fw-bold">__________</span></li>
                        <li>Name  : <span class="fw-bold">{{$record->dealerName}}</span>  </li>
                        <li>Company : Energy Plus</li>
                    </ul>
                </p>
        </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>