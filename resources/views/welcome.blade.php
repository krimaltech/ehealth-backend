<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GHARGHARMA DOCTOR</title>
        <link rel="icon" type="image/x-icon" href="/images/blue-logo.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636B6F;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636B6F;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .title{
                font-size: 45px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/admin') }}" style="font-size: 20px; color:black;">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="font-size: 20px; color:black;">Login</a>
                    @endauth
                </div>
            @endif
            <div class="content">
                <div>
                    <img src="/gd-logo.png" alt="logo" width="100%" style="height: 550px">
                </div>
                <div class="title m-b-md" style="color:black;">
                    GHARGHARMA DOCTOR
                </div>
            </div>
        </div>
    </body>
</html>