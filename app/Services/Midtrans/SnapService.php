<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class SnapService extends Midtrans
{
    public function __construct()
    {
        parent::__construct();

        $this->_configureMidtrans();
    }

    public function createSnapPayment($params)
    {
        $transaction = Snap::createTransaction($params);


        return $transaction;
    }
}
