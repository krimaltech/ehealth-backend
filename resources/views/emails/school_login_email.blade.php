<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student login Credentials</title>

</head>

<body
    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';padding: 0;margin: 0;box-sizing: border-box;font-size: 1em;">
    <div class="container gd-mail-container py-5"
        style="width: 1140px;margin: auto;box-sizing: border-box;padding-top: 35px;padding-bottom: 35px;background-color: rgb(245, 245, 245);">
        <div class="card" style="background-color: #fff;border: 1px solid #DFDFDF;width: 70%;margin: auto;">
            <div class="uniform-padding" style="padding: 40px;">
                <div class="company-logo" style="height: 100px;overflow: hidden;">
                    <img src="https://deployment.ghargharmadoctor.com/static/media/blue-logo.ff09da899c73345d0fb7.png" alt="company - logo"
                        style="height: 100%;aspect-ratio: 1/1;object-fit: contain;">
                </div>
                <div class="mail-title">
                    <h2 style="padding: 0;margin: 15px 0 15px 0;"><b>Student login Credentials</b></h2>
                </div>
                <div class="mail-qr-code px-5 py-3"
                    style="padding-top: 1rem;padding-bottom: 1rem;padding-left: 3rem;padding-right: 3rem;background: #C6DFF6;">
                    <p>Login Credentials</p>
                    <p>Login URL: https://testreact.ghargharmadoctor.com/login</p>
                    <p>User ID: {{ $maildata['email'] }}</p>
                    <p>Password: {{ $maildata['password'] }}</p>
                </div>
            </div>
            <div class="order-end py-4 uniform-padding" style="padding-top: 20px;padding-bottom: 20px;padding: 40px;">
                <div class="mt-3" style="margin-top: 1rem;">
                    <h2 style="padding: 0;margin: 0 0 15px 0;"><b>Thank you for choosing us!</b></h2>
                    <a href="https://ghargharmadoctor.com"><span class="company-txt"
                            style="color: #045AA7;font-size: 1.2em;"><b>ghargharmadoctor.com</b></span></a>
                </div>
            </div>

            <div class="order-footer uniform-padding" style="padding: 40px;background: #C6DFF6;">
                Need Help? Visit our <span class="company-txt" style="color: #045AA7;font-size: 1.2em;">Help
                    Center</span>
            </div>
        </div>

    </div>



</body>

</html>