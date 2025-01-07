<!DOCTYPE html>
<html lang="en">
​

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
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

<body >
    <div class="container"
        style="
    height: 100vh;
    margin: auto;
    padding:30px;
    position: relative;
    overflow: hidden;">
            <div class="imagesss">
                <img src="./blue-logo.png" alt=""
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
            <h2 style="margin: auto;">invoice #{{ $order->order_number }}</h2>
            <p style=" margin-top: 5px;
            text-align: left;">Order Date: {{ $order->created_at->format('D-M-Y') }}</p>
        </div>
        <div class="section1">
            <h3 style="margin-top:40px; margin: 0; margin-top:40px;">Invoiced To</h3>
            <p style="align-items: right; margin: 0;">Mail:{{ $order->user->email }} <br>ATTN: {{ $order->user->name }}
                <br>Address:{{ $order->address }}
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
        ​ <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Product Name</th>
                            <th>QTY</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order['products'] as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->productName }}</td>
                                <td>{{ $item->pivot->quantity }}</td>
                                <td>{{ $item->sale_price }}</td>
                                <td>{{ $item->sale_price * $item->pivot->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <th colspan="4">Sub Total</th>
                        <td>Rs.{{ $order->sub_total }}</td>
                    </tr>
                    <tr>
                        <th colspan="4">Vat (13%)</th>
                        <td>Rs.200</td>
                    </tr>
                    <tr>
                        <th colspan="4">Shipping Charge</th>
                        <td>Rs.{{ $order->shipping->price }}</td>
                    </tr>
                    <tr>
                        <th colspan="4">Total</th>
                        <td>Rs,{{ $order->total_amount }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="text-align: center; margin-top:40px;">PDF Generated On: {{ $order->created_at->format('D-M-Y') }}</div>
    </div>
    
</body>
​

</html>
