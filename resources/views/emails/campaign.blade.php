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
    height: 30vh;
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
        <div>
            {{$mailData['body']}} <br>
            Report PDF Link : {{$mailData['pdf']}}
        </div>
    </div>
</body>

</html>
