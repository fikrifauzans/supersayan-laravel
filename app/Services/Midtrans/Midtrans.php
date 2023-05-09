<?php

namespace App\Services\Midtrans;

use Midtrans\Config;

class Midtrans {
    protected $serverKey;
    protected $isProduction;
    protected $isSanitized;
    protected $is3ds;

    protected $enabledPayments = [
        ['type' => 'credit_card','status' => 'up'],
        ['type' => 'bca_va','category' => 'bank_transfer','status' => 'up'],
        ['type' => 'echannel','category' => 'bank_transfer','status' => 'up'],
        ['type' => 'bni_va','category' => 'bank_transfer','status' => 'up'],
        ['type' => 'permata_va','category' => 'bank_transfer','status' => 'up'],
        ['type' => 'bri_va','category' => 'bank_transfer','status' => 'up'],
        ['type' => 'other_va','category' => 'bank_transfer','status' => 'up'],
        ['type' => 'gopay','mode' => ['deeplink'],'status' => 'up'],
        ['type' => 'shopeepay','status' => 'up'],
        ['type' => 'qris','acquirer' => 'shopeepay','status' => 'up'],
        ['type' => 'bca_klikpay','status' => 'up'],
        ['type' => 'cimb_clicks','status' => 'up'],
        ['type' => 'danamon_online','status' => 'up'],
        ['type' => 'indomaret','category' => 'cstore','status' => 'up'],
        ['type' => 'alfamart','category' => 'cstore','status' => 'up'],
        ['type' => 'kredivo','status' => 'up'],
        ['type' => 'akulaku','status' => 'up'],
        ['type' => 'uob_ezpay','mode' => ['uob_ezpay_web',  'uob_ezpay_deeplink'],'status' => 'up']
    ];

    public function __construct() {
        $this->serverKey = config('midtrans.server_key');
        $this->isProduction = config('midtrans.is_production');
        $this->isSanitized = config('midtrans.is_sanitized');
        $this->is3ds = config('midtrans.is_3ds');

        $this->_configureMidtrans();
    }

    public function _configureMidtrans()
    {
        Config::$serverKey = $this->serverKey;
        Config::$isProduction = $this->isProduction;
        Config::$isSanitized = $this->isSanitized;
        Config::$is3ds = $this->is3ds;
    }

    public function getPaymentChannels()
    {
        return collect($this->enabledPayments)->map(fn ($val) => $val['type']);
    }
}