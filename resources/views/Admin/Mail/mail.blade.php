<!DOCTYPE html>
<html>
<head>
    <title>Report: Expired Car Purchase</title>
</head>
<body>
    <h1>Report: Expired Car Purchase</h1>
    <p>Dear [Boss Ye Win Naing],</p>
    <p>I have identified an issue with a car purchase that requires immediate attention.
     A customer purchased a {{$car['brandName']}} {{$car['modelname']}}( <span style="font-weight :bold ;">{{$car['license_plate']}}</span> ) in this month and made a deposit of {{$car['depositAmount']}} Kyats. However, the purchase date has now expired and the customer has not completed the purchase.</p>
    <p>The customer's information is as follows:</p>
    <table>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Deposit Amount</th>
        </tr>
        <tr>
            <td>{{$car['name']}}</td>
            <td>{{$car['phone']}}</td>
            <td>{{$car['address']}}</td>
            <td>{{$car['depositAmount']}}</td>
        </tr>
    </table>
    <p>The customer made a deposit of 1000 lakhs on <span style="font-wieght:bold ;">[{{$car['startDate']}}]</span> and the final purchase date was set for <span style="font-wieght:bold ;">[{{$car['finalDate']}}]</span>. However, the final purchase date has now expired and the customer has not completed the purchase.</p>
    <p>I recommend that we contact the customer to confirm if they still wish to complete the purchase or if we need to refund their deposit.</p>
    <p>Please let me know if you have any questions or concerns.</p>
    <p>Best regards,</p>
    <p>[Ye Win Naing ]</p>
</body>
</html>