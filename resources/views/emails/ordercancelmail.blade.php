<!DOCTYPE html>
<html lang="en">
​

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
​

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
                    <h2 style="padding: 0;margin: 0 0 15px 0;"><b>Your Order is Canceled</b></h2>
                </div>
                <div class="mail-info">
                    <b>Hello {{ $mailData['name'] }},</b>
                    <p class="text-muted" style="padding: 0;margin: 0 0 15px 0;color: #6c757d !important;">We are sorry
                        that form order id #{{ $mailData['order-number'] }} has been cancelled.You can
                        view tha cancellation reason using tha the link beloow,if you have prepaid for the
                        order the amount will be refunded back to you. Thank you for you understanding.</p>
                </div>
                <div class="mail-qr-code px-5 py-3"
                    style="padding-top: 1rem;padding-bottom: 1rem;padding-left: 3rem;padding-right: 3rem;background: #C6DFF6;">
                    <div class="order-tracking" style="display: flex;flex-wrap: wrap;align-items: center;">
                        <div style="width: 100%;flex-grow: 1;flex-basis: 70%;">
                            Deliver is scheduled to
                            <h3 style="padding: 0;margin: 0 0 15px 0;"><b>Thursday, 17 November - Friday, 18
                                    November</b></h3>
                            <a href="{{ $mailData['url'] }}" class="btn btn-primary mt-3"
                                style="margin-top: 1rem;cursor: pointer;border-radius: .4rem;padding: 6px 12px;display: inline-block;font-size: 1rem;line-height: 1.5rem;background: #007BFF;color: #ffffff;">
                                Track your Package
                            </a>
                        </div>
                        <div style="flex-basis: 30%;">
                            <div class="qr-code"
                                style="width: 100%;display: flex;justify-content: end;overflow: hidden;">
                            </div>
                        </div>
                    </div>
                </div>
                ​
                <div class="mail-order-details mt-3" style="margin-top: 1rem;">
                    <div class="title-section">
                        <h3 style="padding: 0;margin: 0 0 15px 0;"><b>Order Details</b></h3>
                    </div>
                    ​
                    <table class="table"
                        style="border-collapse: collapse;min-width: 100%;border-bottom: 2px solid #F8F8F8;">
                        ​
                        <tbody>
                            <td class="text-center" style="text-align: center;">
                                <span class="text-muted" style="color: #6c757d !important;">Order Date</span><br>
                                <b>{{ $mailData['date'] }}</b>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <span class="text-muted" style="color: #6c757d !important;">Order Number</span><br>
                                <b>#{{ $mailData['order-number'] }}</b>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <span class="text-muted" style="color: #6c757d !important;">Payment</span><br>
                                <b>Cash On Delivery</b>
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <span class="text-muted" style="color: #6c757d !important;">Shipping Address</span><br>
                                <b>{{ $mailData['address'] }}</b>
                            </td>
                        </tbody>
                    </table>
                    ​
                    <div class="order-items-table mt-3" style="margin-top: 1rem;">
                        <table
                            style="width: 100%;border-spacing: 5em;border-collapse: collapse;border-bottom: 2px solid #F8F8F8;">
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Rate</th>
                                <th>Amount</th>
                            </tr>
                            @foreach ($order['products'] as $key => $value)
                                <tr classname="order-item-row">
                                    <td style="width: 20%;overflow: hidden;" class="order-item-image">
                                        <img src="{{ $value->image_path }}" alt=""
                                            style="width: 70%;aspect-ratio: 1/1;object-fit: contain;">
                                        ​
                                    </td>
                                    <td>
                                        <div class="product-name">
                                            <b>{{ $value->productName }}</b>
                                        </div>
                                        <div class="product-quantity">
                                            <span class="text-muted" style="color: #6c757d !important;">Quantity
                                                -{{ $value->pivot->quantity }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-price">
                                            <span class="company-txt" style="color: #045AA7;font-size: 1.2em;"><b>Rs.
                                                    {{ $value->sale_price }}</b></span>
                                            <br>
                                            <!-- <small><s>Rs. 400</s> -20%</small> -->
                                            ​
                                            <div class="per-item">
                                                <!-- <span class="text-muted">Rs 180 per Kg</span> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-amount">
                                            <span class="company-txt" style="color: #045AA7;font-size: 1.2em;"><b>Rs.
                                                    {{ $value->sale_price * $value->pivot->quantity }}</b></span>
                                            <br>
                                            <!-- <small><s>Rs. 400</s> -20%</small> -->
                                            ​
                                            <div class="per-item">
                                                <!-- <span class="text-muted">Rs 180 per Kg</span> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                ​
                <div style="float:right" class="order-summary py-3">
                    <div class="summary-item" style="margin-bottom: 10px;">
                        <span class="summary-label" style="margin-right: 40px;">Subtotal</span>
                        <span><b>Rs
                                @php
                                    $total = 0;
                                    foreach ($order['products'] as $key => $value) {
                                        $total += $value->sale_price * $value->pivot->quantity ;
                                    }
                                @endphp
                                {{ $total }}
                            </b></span>
                    </div>
                    <div class="summary-item" style="margin-bottom: 10px;">
                        <span class="summary-label" style="margin-right: 40px;">Shipping</span>
                        <span><b>Rs ...</b></span>
                    </div>
                    <div class="summary-item" style="margin-bottom: 10px;">
                        <span class="summary-label" style="margin-right: 40px;">VAT</span>
                        <span><b>Rs ...</b></span>
                    </div>
                    <div class="summary-item" style="margin-bottom: 10px;border-top: 3px solid #F8F8F8;">
                        <span class="summary-label" style="margin-right: 40px;"><b>Total</b></span>
                        <span class="company-txt" style="color: #045AA7;font-size: 1.2em;"><b>Rs {{ $total }}</b></span>
                    </div>
                </div>
            </div>
            ​
            <div class="order-end py-4 uniform-padding" style="padding-top: 20px;padding-bottom: 20px;padding: 40px;">
                <div class="text-muted" style="color: #6c757d !important;">
                    <b>We'll be sending a shipping confirmation email when the items shipped successfully.</b>
                </div>
                <div class="mt-3" style="margin-top: 1rem;">
                    <h2 style="padding: 0;margin: 0 0 15px 0;"><b>Thank you for shopping with us!</b></h2>
                    <span class="company-txt"
                        style="color: #045AA7;font-size: 1.2em;"><b>Ghargharmadoctor.com</b></span>
                </div>
            </div>
            ​
            <div class="order-footer uniform-padding" style="padding: 40px;background: #C6DFF6;">
                Need Help? Visit our <span class="company-txt" style="color: #045AA7;font-size: 1.2em;">Help
                    Center</span>
            </div>
        </div>
        ​
    </div>
    ​

    ​
</body>
​

</html>
