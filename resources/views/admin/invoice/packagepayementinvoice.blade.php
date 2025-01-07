<!DOCTYPE html>
<html lang="en">
​

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="section" style="display: flex; justify-content: space-between;">
        <div class="rectangle" style="width: 134px; height: 62px; background-color:#52C8F4;position: relative;">
            <p style="position: absolute; top: 5px;left: 8px; font-size: 18px;"><img
                    src="{{ asset('/images/blue-logo.png') }}" alt="logo"></p>
        </div>
        <div class="unpaid" style="width: 134px; height: 82px; background-color: #3d9c17;position: relative;">
            <p style="font-size: 28px; color: white; position: absolute; top: 2px; left: 18px; font-weight: bold;">
                PAID</p>
        </div>
    </div>
    <div class="address">
        <p style="text-align: right;">Ghargharmadoctor Pvt.Ltd.<br>
            VAT No : 606601586 <br>
            Phone : +977 9869421801 <br>
            Email : ghargharmadoctor@gmail.com <br>
            Web : www.ghargharmadoctor.com</p>
    </div>
    <div class="secondcontent"
        style="width: 100%;
height: 150px;
left: -3px;
top: 200px;background: #423f3f; margin-top: 80px;">
        <p style="color: #C6DFF6; font-size: 18px; padding-top: 10px; margin-left: 25px;">Invoice to :</p>
        <p style="color: white; margin-left: 25px;padding-top:0;">Transaction no. : # <br>
            Booked date : {{ $mailData['date'] }} <br>
    </div>
    <table class="border" style="width: 100%;margin-top: 80px;">
        <thead style="background-color: #52C8F4; color: black;">
            <tr>
                <th>S.N</th>
                <th>Package Name</th>
                <th>Payment Interval</th>
                <th>Paid Method</th>
                <th>Paid Amoutn</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong> {{ $mailData['package_name'] }}</strong></td>
                <td><strong> {{ $mailData['payment_interval'] }}</strong></td>
                <td><strong> {{ $mailData['payment_method'] }}</strong></td>
                <td><strong> {{ $mailData['payment_amount'] }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="last" style="text-align: center; margin-top: 80px;">PDF Generated on :
        {{ $mailData['date'] }}</div>

    ​
</body>

</html>  
