<?php

namespace App\Traits;

trait QontakNotification
{
    public static function jamaahRegistration(
        $newPassword = null,
        $jamaah = [],
        $packet = null
    ) {
        if ($newPassword && $jamaah && $jamaah['phone'] && $packet) {
            $messageId = config('qontak.jamaah_setelah_mendaftar_paket');

            self::sendMessage(
                $jamaah['phone'],
                $jamaah['name'],
                $messageId,
                [
                    self::params(1, 'name', $jamaah['name']),
                    self::params(2, 'packet', $packet),
                    self::params(3, 'password', $newPassword),
                    self::params(4, 'url', url('/auth/login'))
                ]
            );
        } else {
            new \Exception("Invalid Notification Body", 422);
        }
    }

    public static function jamaahPayment($jamaah = [], $packet = [], $trx = [])
    {
        if ($trx && $jamaah && $packet) {
            $messageId = config('qontak.notifikasi_pembayaran_jamaah');

            self::sendMessage(
                $jamaah['phone'],
                $jamaah['name'],
                $messageId,
                [
                    self::params(1, 'name', $jamaah['name']),
                    self::params(2, 'category', ucwords($packet['category'])),
                    self::params(3, 'jamaah_id', $jamaah['id']),
                    self::params(4, 'packet', $packet['title']),
                    self::params(5, 'departure', date('d F Y', strtotime($packet['departure_date']))),
                    self::params(6, 'dp', "Rp " . number_format($trx['dp'], 0, null, ".")),
                    self::params(7, 'attempt', "Rp " . number_format($trx['sisa'], 0, null, ".")),
                    self::params(8, 'link', url('/jamaah/data/pelunasan')),
                ]
            );
        } else {
            throw new \Exception("Invalid Notification Body", 422);
        }
    }

    public static function jamaahRepayment($jamaah = [], $packet = [], $trx = [])
    {
        if ($jamaah && $trx && $packet) {
            $messageId = config('qontak.notifikasi_pelunasan_jamaah');

            self::sendMessage(
                $jamaah['phone'],
                $jamaah['name'],
                $messageId,
                [
                    self::params(1, 'name', $jamaah['name']),
                    self::params(2, 'category', ucwords($packet['category'])),
                    self::params(3, 'nominal', 'Rp ' . number_format($trx['amount'], 0, null, ".")),
                    self::params(4, 'jamaah_id', $jamaah['id']),
                    self::params(5, 'packet', $packet['title']),
                    self::params(6, 'departure', date('d F Y', strtotime($packet['departure_date']))),
                    self::params(7, 'dp', "Rp " . number_format($trx['dp'], 0, null, ".")),
                    self::params(8, 'method', $trx['payment_method_name'] ?? '-'),
                ]
            );
        } else {
            throw new \Exception("Invalid Notification Body", 422);
        }
    }

    public static function forgotPassword($code, $user)
    {
        if ($code && $user) {
            $messageId = config('qontak.lupa_password');

            return self::sendMessage(
                $user['phone'],
                $user['name'],
                $messageId,
                [
                    self::params(1, 'code', $code)
                ]
            );
        } else {
            return false;
        }
    }

    private static function params($key, $value, $text)
    {
        return [
            'key' => $key,
            'value' => $value,
            'value_text' => $text
        ];
    }

    private static function generateNumber($toNumber)
    {
        if ((substr($toNumber, 0, 2) == "62")) {
            return $toNumber;
        }
        if (substr($toNumber, 0, 1) == "0") {
            return "62" . substr($toNumber, 1);
        }
        if (substr($toNumber, 0, 1) == "+") {
            return substr($toNumber, 1);
        }

        return "62" . $toNumber;
    }

    private static function sendMessage($toNumber, $toName, $messageId, $params)
    {
        $body = [
            "to_number" => self::generateNumber($toNumber),
            "to_name" => $toName,
            "message_template_id" => $messageId,
            "channel_integration_id" => config('qontak.channel_id'),
            "language" => [
                "code" => "id"
            ],
            "parameters" => [
                "body" => $params
            ]
        ];

        $body = json_encode($body);

        try {
            // 
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, config('qontak.base') . '/oauth/token');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                "username" => config('qontak.username'),
                "password" => config('qontak.password'),
                "grant_type" => "password",
                "client_id" => config('qontak.client_id'),
                "client_secret" => config('qontak.client_secret')
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $auth = json_decode(curl_exec($ch), true);
            // 

            if ($auth && !isset($auth['error']) && $auth['access_token']) {
                $bearer = "Bearer " . $auth['access_token'];

                // 
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, config('qontak.base') . '/api/open/v1/broadcasts/whatsapp/direct');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-Type: application/json",
                    'Authorization: ' . $bearer,
                ));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $send = json_decode(curl_exec($ch), true);

                if ($send != null && $send['status'] != 'error') {
                    return true;
                }
            }
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }

    private static function http_build_query_for_curl($arrays, &$new = array(), $prefix = null)
    {

        if (is_object($arrays)) {
            $arrays = get_object_vars($arrays);
        }

        foreach ($arrays as $key => $value) {
            $k = isset($prefix) ? $prefix . '[' . $key . ']' : $key;
            if (is_array($value) or is_object($value)) {
                $new = self::http_build_query_for_curl($value, $new, $k);
            } else {
                $new[$k] = $value;
            }
        }

        return $new;
    }
}
