<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class EsewaController extends Controller
{
    public function payment(Request $request)
    {
        if ($request->oid && $request->amt && $request->refId) {
            $order = Order::where('order_number', $request->oid)->first();
            if ($order) {
                $url = "https://uat.esewa.com.np/epay/transrec";
                $data = [
                    'amt' => $order->total_amount,
                    'rid' => $request->refId,
                    'pid' => $order->order_number,
                    'scd' => 'epay_payment',
                ];
            }
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            $response_code = $this->get_response('response_code', $response);
            if (trim($response_code) == 'Success') {
                $order->payment_method = 'esewa';
                $order->paymemt_status = 'paid';
                $order->status = 'process';
                $order->save();
                return response()->json('success');
            }
        }
    }
    public function failure()
    {
        return response()->json([
            'success' => 'Transaction Failed',
        ]);
    }
    //extract value from response code of verification of payment
    public function get_response($node, $xml)
    {
        if ($xml == false) {
            return false;
        }
        $found = preg_match('|\\\\tmp\\\\([A-Za-z0-9]+)|', $xml, $matches);
        if ($found != false) {
            return $matches[1];
        }
        return false;
    }
    public function success()
    {
        return response()->json([
            'success' => 'Transaction Successful',
        ]);
    }
}
