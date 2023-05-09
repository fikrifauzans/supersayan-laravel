<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Traits\QontakNotification as Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WAController extends Controller
{
    public function jamaahRegistration(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'phone' => 'required|min:8'
        ]);

        if ($validation->fails()) {
            echo $validation->errors()->first();
            return;
        }

        $password = '12345678';
        $jamaah = [
            'name' => 'Jamaah',
            'phone' => $request->phone
        ];
        $packet =  'Paket Umrah TEST';

        Notify::jamaahRegistration($password, $jamaah, $packet);
        echo "sent";
    }

    public function jamaahPayment(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'phone' => 'required|min:8'
        ]);

        if ($validation->fails()) {
            echo $validation->errors()->first();
            return;
        }

        $jamaah = [
            'id' => 'JMH-001',
            'name' => 'Jamaah',
            'phone' => $request->phone
        ];
        $packet = [
            'title' => 'Paket Umrah TEST',
            'category' => 'Umrah',
            'departure_date' => now(),
        ];
        $trx = [
            'dp' => 5_000_000,
            'sisa' => 95_000_000
        ];

        Notify::jamaahPayment($jamaah, $packet, $trx);
        echo "sent";
    }

    public function jamaahRepayment(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'phone' => 'required|min:8'
        ]);

        if ($validation->fails()) {
            echo $validation->errors()->first();
            return;
        }

        $jamaah = [
            'id' => 'JMH-001',
            'name' => 'Jamaah',
            'phone' => $request->phone
        ];
        $packet = [
            'title' => 'Paket Umrah TEST',
            'category' => 'Umrah',
            'departure_date' => now(),
        ];
        $trx = [
            'dp' => 5_000_000,
            'amount' => 50_000_000,
            'payment_method_name' => 'Bank Jago'
        ];

        Notify::jamaahRepayment($jamaah, $packet, $trx);
        echo "sent";
    }

    public function forgotPassword(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'phone' => 'required|min:8'
        ]);

        if ($validation->fails()) {
            echo $validation->errors()->first();
            return;
        }

        $code = '1234';
        $user = [
            'name' => 'Jamaah',
            'phone' => $request->phone
        ];

        Notify::forgotPassword($code, $user);
        echo "sent";
    }
}
