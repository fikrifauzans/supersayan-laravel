<?php

namespace App\Traits\Payment;

trait ParsePaymentMethod
{
    public static function parse($notif, $trx)
    {

        // credit_card, gopay, qris, shopeepay,
        // bank_transfer: permata_va_number, va_numbers:0:bank(bca, bni, bri)
        // echannel / mandiri bill
        // bca_klikpay, bca_klikbca, cimb_clicks, danamon_online
        // cstore: store(indomaret, alfamart)
        // akulaku, bri_epay
        $payment_type = $notif->payment_type;
        $payment_code = null;
        $payment_name = null;

        if ($payment_type == 'bank_transfer') {
            if ($notif->permata_va_number) {
                $payment_code = "permata_va";
                $payment_name = "Permata VA";
            } elseif ($notif->va_numbers) {
                $payment_code = $notif->va_numbers[0]->bank . "_va";
                $payment_name = strtoupper($notif->va_numbers[0]->bank) . " VA";
            }
        } elseif ($payment_type == "echannel") {
            $payment_code = "echannel";
            $payment_name = "Mandiri Bill";
        } elseif ($payment_type == 'cstore') {
            $payment_code = $notif->store;
            $payment_name = ucwords($notif->store);
        } else {
            $payment_code = $notif->payment_type;
            $payment_name = ucwords(str_replace("_", " ", $notif->payment_type));
        }


        // TODO updating transaction payment method
        // $trx->update([
        //     'payment_method_code' => $payment_code,
        //     'payment_method_name' => $payment_name,
        // ]); 
    }
}
