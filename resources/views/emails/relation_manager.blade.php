<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Refer As Relation Manager</title>
</head>

<body
    style="
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; padding: 0; margin: 0; box-sizing: border-box; font-size: 1em;">
    <div class="container gd-mail-container py-5"
        style="
        width: 1140px;
        margin: auto;
        box-sizing: border-box;
        padding-top: 35px;
        padding-bottom: 35px;
        background-color: rgb(245, 245, 245);
      ">
        <div class="card"
            style="
          background-color: #fff;
          border: 1px solid #dfdfdf;
          width: 70%;
          margin: auto;
        ">
            <div class="uniform-padding" style="padding: 40px">
                <div class="company-logo" style="height: 100px; overflow: hidden">
                    <img src="/images/blue-logo.png" alt="company - logo"
                        style="height: 100%; aspect-ratio: 1/1; object-fit: contain" />
                </div>
                <div class="mail-title">
                    <h1>Employee Code: {{$refer_as_ro['name']}}</h1>
                    <h2 style="padding: 0; margin: 0 0 15px 0">
                        <b>Press below link to register an account.</b>
                    </h2>
                </div>
                <div class="mail-info">
                    <p class="text-muted" style="padding: 0; margin: 0 0 15px 0; color: #6c757d !important">
                        Press below link register
                    </p>
                </div>
                <div style="padding-bottom: 10px"><a href="{{$refer_as_ro['web_url']}}" class="btn btn-primary">Register with WEB</a></div>
                <div><a href="{{$refer_as_ro['mobile_url']}}" class="btn btn-primary">Register with Mobile</a></div>
            </div>

            <div class="order-end py-4 uniform-padding" style="padding-top: 20px; padding-bottom: 20px; padding: 40px">
                <div class="mt-3" style="margin-top: 1rem">
                    <h2 style="padding: 0; margin: 0 0 15px 0">
                        <b>Thank you for Joining with us!</b>
                    </h2>
                    <span class="company-txt"
                        style="color: #045aa7; font-size: 1.2em"><b>Ghargharmadoctor.com</b></span>
                </div>
            </div>

            <div class="order-footer uniform-padding" style="padding: 40px; background: #c6dff6">
                Need Help? Visit our
                <span class="company-txt" style="color: #045aa7; font-size: 1.2em">Help Center</span>
            </div>
        </div>
    </div>
</body>

</html>