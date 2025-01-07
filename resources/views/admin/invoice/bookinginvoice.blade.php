<!DOCTYPE html>
<html lang="en">
​

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
​

<body>
    <div class="container"
        style="
    height: 100vh;
    margin: auto;
    padding:30px;
    position: relative;
    overflow: hidden;">
        <div class="imagesss">
            <img src="https://demo.ghargharmadoctor.com/images/blue-logo.png" alt=""
                style=" width:38px;
                width: 60px;
                margin-top: 50px;">
        </div>
        <div style="text-align: right">
            <h4>Ghargharmadoctor Pvt.Ltd.</h4>
            <p>VAT No:606601586
                <br> Phone: +9779869421801 <br>Email: ghargharmadoctor@gmail.com <br>Web
                :www.ghargharmadoctor.com
            </p>
        </div>
        <div class="section"
            style=" 
        height: 10%;
        background-color:lightgray;
        margin-top: 30px;
        padding: 20px;">
            <h2 style="margin: auto;">invoice # {{ $booking['booking_status'] }}</h2>
            <p style=" margin-top: 5px; text-align: left;">Invoice Date: {{ $booking['payment_date'] }}
        </div>
        <div class="section1">
            <h3 style="margin-top:40px; margin: 0; margin-top:40px;">Invoiced To</h3>
            <p style="align-items: right; margin: 0;">Jaruwa Nepal Pvt. Ltd. <br>ATTN: Amar Suwal
                <br><br>Nepal
            </p>
        </div>
        <div class="status"
            style="  position: absolute;
        background-color: green;
        border: 2px solid black;
        color: white;
        width: 260px;
        padding: 5px;
        text-align: center;
        top:28px;
        right: -70px;
        transform: rotate(45deg);">
            <h2>PAID</h2>
        </div>
        <br>
        <table class="table"style="width:100%">
            <thead>
                <tr>
                    <th>Booking Status</th>
                    <th>Payment Date</th>
                    <th>Paid Method</th>
                    <th>Paid Amoutn</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><strong> {{ $booking['booking_status'] }}</strong></td>
                    <td><strong> {{ $booking['payment_date'] }}</strong></td>
                    <td><strong> {{ $booking['payment_method'] }}</strong></td>
                    <td><strong> {{ $booking['payment_amount'] }}</strong></td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>
