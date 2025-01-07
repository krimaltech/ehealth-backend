<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body
    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';padding: 0;margin: 0;box-sizing: border-box;font-size: 1em;">
    <div class="container gd-mail-container py-5"
        style="width: 1140px;margin: auto;box-sizing: border-box;padding-top: 35px;padding-bottom: 35px;background-color: rgb(245, 245, 245);">
        <div class="card" style="background-color: #fff;border: 1px solid #DFDFDF;width: 70%;margin: auto;">
            <div class="uniform-padding" style="padding: 40px;">
                <div class="company-logo" style="height: 100px;overflow: hidden;">
                    <img src="./blue-logo.png" alt="company - logo"
                        style="height: 100%;aspect-ratio: 1/1;object-fit: contain;">
                </div>
                <div class="mail-title">
                    <h2 style="padding: 0;margin: 0 0 15px 0;"><b>Verify Your account</b></h2>
                </div>
                <div class="mail-info">
                    <p class="text-muted" style="padding: 0;margin: 0 0 15px 0;color: #6c757d !important;">We are
                    almost done. Your account is created. Now you just need to vefiy your email.</p>
                </div>
                <div class="mail-qr-code px-5 py-3"
                    style="padding-top: 1rem;padding-bottom: 1rem;padding-left: 3rem;padding-right: 3rem;background: #C6DFF6;">
                    <div class="order-tracking" style="display: flex;flex-wrap: wrap;align-items: center;">
                        <div style="width: 100%;flex-grow: 1;flex-basis: 70%;">
                            <a href="{{ route('user.verify', $token) }}" class="btn btn-primary mt-3"
                                style="margin-top: 1rem;cursor: pointer;border-radius: .4rem;padding: 6px 12px;display: inline-block;font-size: 1rem;line-height: 1.5rem;background: #007BFF;color: #ffffff;">
                                Verify Your Account
                            </a>
                        </div>
                        <div style="flex-basis: 30%;">
                            <div class="qr-code"
                                style="width: 100%;display: flex;justify-content: end;overflow: hidden;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-footer uniform-padding" style="padding: 40px;background: #C6DFF6;">
                
                <span class="company-txt" style="color: #045AA7;font-size: 1.2em;">Help Center</span>
            </div>
        </div>

    </div>



</body>

</html>
