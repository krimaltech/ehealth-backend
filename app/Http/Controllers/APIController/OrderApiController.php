<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Mail\OrderCancelMail;
use App\Mail\OrderPaymentMail;
use App\Mail\PostOrderMail;
use App\Models\BookingNotification;
use App\Models\CancelReason;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\StoreToken;
use App\Models\TransactionStatement;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderApiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->order_number) {
            $order = Order::with('products', 'shipping')->where('user_id', auth()->user()->id)->where('order_number', $request->order_number)->orderBy('created_at', 'desc')->get();
        } else {
            $order = Order::with('products', 'shipping')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        return response()->json($order);
    }
    public function store(Request $request)
    {
        $items = $request->only(['id', 'order_number', 'sub_total', "shipping_id", 'total_amount', 'payment_method', 'phone', 'address', 'orders']);
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->order_number = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 8);
        $order->wishlist_id = $request->wishlist_id;
        $order->sub_total = $request->sub_total;
        $order->shipping_id = $request->shipping_id;
        $order->coupon = $request->coupon;
        $order->total_amount = $request->total_amount;
        $order->payment_method = $request->payment_method ? $request->payment_method : 'cod';
        $order->payment_status = 'unpaid';
        $order->status = 'pending';
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->address1 = $request->address1;
        $order->save();
        $order_id = $order->id;
        $productList = [];
        foreach ($items['orders'] as $key => $value) {
            $details = new OrderProduct();
            $details->order_id = $order_id;
            $details->product_id = $value['id'];
            $details->quantity = $value['quantity'];
            $details->vendor_id = $value['vendor_id'];
            $details->save();
            $products = Product::findOrFail($details->product_id);
            $products->decrement('stock', $details->quantity);
            $products->save();
            $details->name = $products->productName;
            $details->price = $products->sale_price;
            $details->image = $products->image;
            $details->image_path = $products->image_path;
            array_push($productList, $details);
        }
        $mailData = [
            'title' => '  Order Number' . '' . $order->order_number,
            'body' => 'Your Order Has Been Posted',
            'order-number' => $order->order_number,
            'address' => $order->address,
            'phone' => $order->phone,
            'name' => $order->user->name,
            'email' => $order->user->email,
            'products' => $productList,
            'date' => $order->created_at->format('d/M/Y'),
            'url' => 'https://react.ghargharmadoctor.com/user/orders'
        ];
        $order = Order::with('products', 'shipping', 'user')->findOrFail($order->id);
        $pdf = Pdf::loadView('admin.order.invoice', compact('order'))->setOptions(['defaultFont' => 'sans-serif']);
        Mail::to($order->user->email)->send(new PostOrderMail($mailData, $pdf));

        //order user  notification
        $bookingNotification = new BookingNotification();
        $id = Auth::user()->id;
        $user = Member::where('member_id', $id)->first();
        $bookingNotification->user_id = Auth::user()->id;
        $bookingNotification->image = $user->image_path;
        $bookingNotification->title = "Order Notification";
        $bookingNotification->body = "You have placed a Rs." . ' ' . $order->total_amount . ' ' . "order form GD";
        $bookingNotification->type = "Order";
        $bookingNotification->save();

        $user_device_key  = StoreToken::where('user_id', Auth::user()->id)->first();
        if ($user_device_key) {
            $text = "You have placed a Rs." . ' ' . $order->total_amount . ' ' . "order form GD";
            $title = "Order Notification";
            $notification_id = $user_device_key->device_key;
            $type = "Order";
            send_notification_FCM($notification_id, $title, $text,$type);
        }
        return response()->json([
            'status' => 'success',
            'order_number' => $order->order_number,
            'id' => $order->id,
        ]);
    }

    public function cancelOrder(Request $request, $order_number)
    {
        $order = Order::with('products', 'user')->findOrFail($order_number);
        foreach ($order['products'] as $key => $value) {
            $products = Product::findOrFail($value->pivot->product_id);
            $products->increment('stock', $value->pivot->quantity);
            $products->save();
            $order->status = 'cancelled';
            $mailData = [
                'title' => 'Cancellation Of Order Number' . '' . $order->order_number,
                'body' => 'Your Order Has Been Canceled',
                'order-number' => $order->order_number,
                'name' => $order->user->name,
                'address' => $order->address,
                'date' => $order->created_at->format('d/M/Y'),
                'productlist' => $order,
                'url' => 'https://react.ghargharmadoctor.com/user/order-details/' . $order->order_number
            ];
        }
        Mail::to($order->user->email)->send(new OrderCancelMail($mailData, $order));
        $order->cancel_reason = $request->cancel_reason;
        $order->description = $request->description;
        $order->update();
        $user_device_key  = StoreToken::where('user_id', Auth::user()->id)->first();
        if ($user_device_key) {
            $title = "Order Cancel Notification";
            $notification_id = $user_device_key->device_key;
            $type = "Order";
            send_notification_FCM($notification_id, $title, $mailData['title'],$type);
        }

        return response()->json(['success' => 'Order Canceled successfully.']);
    }

    public function deliveredOrder($order_number)
    {
        $order = Order::findOrFail($order_number);
        $order->status = 'delivered';
        $order->update();

        //order delivered  notification
        $bookingNotification = new BookingNotification();
        $id = Auth::user()->id;
        $user = Member::where('member_id', $id)->first();
        $bookingNotification->user_id = Auth::user()->id;
        $bookingNotification->image = $user->image_path;
        $bookingNotification->title = "Order Delerived Notification";
        $bookingNotification->body = "You order number" . ' ' . $order->order_number . ' ' . "has been successfully delerived form GD";
        $bookingNotification->type = "Order";
        $saved = $bookingNotification->save();


        $user_device_key  = StoreToken::where('user_id', Auth::user()->id)->first();
        if ($user_device_key) {
            $title = $bookingNotification->title;
            $text = $bookingNotification->body;
            $notification_id = $user_device_key->device_key;
            $type = "Order";
            send_notification_FCM($notification_id, $title, $text,$type);
        }
        return response()->json(['success' => 'Order Delivered successfully.']);
    }

    public function paymentOrder(Request $request)
    {
        if($request->token){
            //payment verification (app)
            $khaltiVerify = Helper::khaltiVerify($request);
            if (isset($khaltiVerify['idx'])) {
                $order = Order::with('products', 'user')->find($request->input('id'));
                $order->payment_status = 'paid';
                $order->status = 'processing';
                $updated = $order->update();
                if ($updated) {
                    $pdf = Pdf::loadView('admin.invoice.orderpayment', compact('order'))->setOptions(['defaultFont' => 'sans-serif']);
                    Mail::to(auth()->user()->email)->send(new OrderPaymentMail($order, $pdf));
                    $user_device_key  = StoreToken::where('user_id', Auth::user()->id)->first();
                    
                    //order payment  notification
                    $bookingNotification = new BookingNotification();
                    $id = Auth::user()->id;
                    $user = Member::where('member_id', $id)->first();
                    $bookingNotification->user_id = Auth::user()->id;
                    $bookingNotification->image = $user->image_path;
                    $bookingNotification->title = "Order Payment";
                    $bookingNotification->body = "You order number" . ' ' . $order->order_number . ' ' . "payment has been successfully completed";
                    $bookingNotification->type = "Order";
                    $bookingNotification->save();

                    $statement = new TransactionStatement();
                    $statement->date = Carbon::now();
                    $statement->user_id = auth()->user()->id;
                    $statement->name = auth()->user()->name;
                    $statement->address = $user->address;
                    $statement->amount = $order->total_amount;
                    $statement->status = 'Completed';
                    $statement->payment_method = 'Khalti';
                    $statement->channel = 'WEB';
                    $statement->service_name = 'Product';
                    $statement->save();

                    // $user_device_key  = StoreToken::where('user_id', Auth::user()->id)->first();
                    // if ($user_device_key->device_key) {
                    //     $title = $bookingNotification->title;
                    //     $text = $bookingNotification->body;
                    //     $notification_id = $user_device_key->device_key;
                    //     send_notification_FCM($notification_id, $title, $text);
                    // }


                    // Added By Rajib Kumar Bhujel for mail
                    return response()->json([
                        'success' => 'Order Payment successfully.',
                    ]);
                }
            } else {
                return response()->json([
                    'error' => 'Something went Wrong.',
                ]);
            }
        }else{
            //payment verification (web)
            $khaltiLookup = Helper::khaltiLookup($request->pidx);
            $responseData = $khaltiLookup->getData();
            if(isset($responseData->status) && $responseData->status === 'Completed'){
                $order = Order::with('products', 'user')->find($request->input('id'));
                $order->payment_status = 'paid';
                $order->status = 'processing';
                $updated = $order->update();
                if ($updated) {
                    $pdf = Pdf::loadView('admin.invoice.orderpayment', compact('order'))->setOptions(['defaultFont' => 'sans-serif']);
                    Mail::to(auth()->user()->email)->send(new OrderPaymentMail($order, $pdf));
                    $user_device_key  = StoreToken::where('user_id', Auth::user()->id)->first();
                    
                    //order payment  notification
                    $bookingNotification = new BookingNotification();
                    $id = Auth::user()->id;
                    $user = Member::where('member_id', $id)->first();
                    $bookingNotification->user_id = Auth::user()->id;
                    $bookingNotification->image = $user->image_path;
                    $bookingNotification->title = "Order Payment";
                    $bookingNotification->body = "You order number" . ' ' . $order->order_number . ' ' . "payment has been successfully completed";
                    $bookingNotification->type = "Order";
                    $bookingNotification->save();

                    $statement = new TransactionStatement();
                    $statement->date = Carbon::now();
                    $statement->user_id = auth()->user()->id;
                    $statement->name = auth()->user()->name;
                    $statement->address = $user->address;
                    $statement->amount = $order->total_amount;
                    $statement->status = 'Completed';
                    $statement->payment_method = 'Khalti';
                    $statement->channel = 'WEB';
                    $statement->service_name = 'Product';
                    $statement->save();

                    // $user_device_key  = StoreToken::where('user_id', Auth::user()->id)->first();
                    // if ($user_device_key->device_key) {
                    //     $title = $bookingNotification->title;
                    //     $text = $bookingNotification->body;
                    //     $notification_id = $user_device_key->device_key;
                    //     send_notification_FCM($notification_id, $title, $text);
                    // }


                    // Added By Rajib Kumar Bhujel for mail
                    return response()->json([
                        'success' => 'Order Payment successfully.',
                    ]);
                }
            } else {
                return response()->json([
                    'error' => 'Payment Pending.',
                ],400);
            }
        }
    }

    public function cancelReason()
    {
        $cancelReason = CancelReason::all();
        return response()->json($cancelReason);
    }

    public function orderStatus(Request $request)
    {
        $status = $request->status;
        $order = Order::with('products')->where('user_id', auth()->user()->id)->where('status', $status)->orderBy('created_at', 'desc')->get();
        return $order;
    }

    public function vendorWiseProduct(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $orderProducts = OrderProduct::with('products', 'orders')->where('vendor_id', $vendor_id)->orderBy('created_at', 'desc')->get();
        return response()->json($orderProducts);
    }

    public function shippingDetails()
    {
        $shipping = Shipping::get();
        return response()->json($shipping);
    }

    public function getAllStatement()
    {
        $statement = TransactionStatement::where('user_id',auth()->user()->id)->get();
        return response()->json($statement);
    }
}
