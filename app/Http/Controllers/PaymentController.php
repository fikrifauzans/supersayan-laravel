<?php

namespace App\Http\Controllers;

use App\Traits\Payment\JamaahPaymentHandler;
use App\Traits\Payment\PaymentMethods;

class PaymentController extends Controller
{

    public function getPaymentMethods()
    {
        return response()->json(
            [
                'code' => 200,
                'status' => 'Success',
                'data' => PaymentMethods::$availableMethods
            ]
        );
    }

    public function notify()
    {
        $serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$serverKey = $serverKey;
        $notif = new \Midtrans\Notification();
        // $notif = request();

        // SHA512(order_id+status_code+gross_amount+ServerKey)
        $order_id = $notif->order_id;
        $signature_key = $notif->signature_key;
        $status_code = $notif->status_code;
        $gross_amount = $notif->gross_amount;
        $check = hash("sha512", implode("", [
            $order_id,
            $status_code,
            $gross_amount,
            $serverKey
        ]));

        if ($signature_key != $check) {
            return response()->json([
                'message' => "Signature check failed, {$signature_key} doesnt match {$check}"
            ], 503);
        }

        return JamaahPaymentHandler::handleNotification($notif);
    }
}
