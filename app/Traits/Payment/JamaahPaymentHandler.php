<?php

namespace App\Traits\Payment;

use App\Traits\Payment\ParsePaymentMethod;
use Illuminate\Support\Facades\DB;
use App\Traits\QontakNotification as Notify;

trait JamaahPaymentHandler
{
    public static function handleNotification($payload)
    {
        // parse payment information
        $transaction = $payload->transaction_status;
        $type = $payload->payment_type;
        $order_id = $payload->order_id;
        $fraud = $payload->fraud_status;

        // TODO checking transaction
        $trx = "select from db where order id";
        // if (!$trx) {
        //     return response()->json([
        //         'message' => `Jamaah Payment Transaction not found ${order_id}`
        //     ], 404);
        // }

        DB::beginTransaction();

        try {
            // ** ONLY if you need to save payment method used
            ParsePaymentMethod::parse($payload, $trx);

            if ($transaction == 'capture') {
                // For credit card transaction, we need to check whether transaction is challenge by FDS or not
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        // TODO set payment status in merchant's database to 'Challenge by FDS'
                        // TODO merchant should decide whether this transaction is authorized or not in MAP
                        return response()->json([
                            'message' => "Order ${order_id} still challenge"
                        ], 200);
                    } else {
                        // TODO set payment status in merchant's database to 'Success'
                        return self::successHandler($trx);
                    }
                }
            } else if ($transaction == 'settlement') {
                // TODO set payment status in merchant's database to 'Settlement'
                // echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
                self::successHandler($trx);
            } else if ($transaction == 'pending') {
                // TODO set payment status in merchant's database to 'Pending'
                // echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
                // $trx->update([
                //     'status' => 'pending'
                // ]);
            } else if ($transaction == 'deny') {
                // TODO set payment status in merchant's database to 'Denied'
                // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
                // $trx->update([
                //     'status' => 'failed',
                //     'pg_status' => 'denied'
                // ]);
            } else if ($transaction == 'expire') {
                // TODO set payment status in merchant's database to 'expire'
                // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
                // $trx->update([
                //     'status' => 'failed',
                //     'pg_status' => 'expired'
                // ]);
            } else if ($transaction == 'cancel') {
                // TODO set payment status in merchant's database to 'Denied'
                // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
                // $trx->update([
                //     'status' => 'canceled',
                // ]);
            }

            DB::commit();

            return response()->json([
                'message' => "Notification Read Success ${order_id}"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => "Process Failed {$e->getMessage()}"
            ], 500);
        }
    }

    public static function successHandler($trx)
    {
        // TODO all you need to do when payment succeed
        Notify::jamaahRepayment($trx);
    }
}
