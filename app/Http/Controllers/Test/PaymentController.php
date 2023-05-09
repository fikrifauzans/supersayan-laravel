<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function booking(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'total' => 'required|integer|min:1000',
            'payment_method' => 'nullable|in:bni_va,bri_va'
        ]);

        if ($validation->fails()) {
            echo $validation->errors()->first();
            return;
        }
        // basic config
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

        // payment parameters
        $params = [
            'transaction_details' => [
                'order_id' => 'TRX-' . uniqid(),
                'gross_amount' => $request->total,
            ],
            'customer_details' => [
                'first_name' => 'Jamaah',
                'email' => 'jamaah@ums.com',
                'phone' => '085********',
            ],
        ];
        if ($request->payment_method) {
            $params['enabled_payments'] = [$request->payment_method];
        }

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        echo $snapToken;
    }
}
