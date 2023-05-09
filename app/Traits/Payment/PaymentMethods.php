<?php

namespace App\Traits\Payment;

trait PaymentMethods
{
    public $paymentMethod;
    public static $availableMethods = [
        'bni_va' => [
            'title' => 'BNI Virtual Account',
            'icon' => 'images/payments/bni.svg',
        ],
        'bri_va' => [
            'title' => 'BRI Virtual Account',
            'icon' => 'images/payments/bri.svg',
        ],
        'others' => [
            'title' => 'Metode Lainnya',
            'icon' => null,
        ],
        // TODO you can always add other methods since it's still not dynamics
    ];

    public function paymentMethodChoosen($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }
}
