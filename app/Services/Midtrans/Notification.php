<?php

namespace App\Services\Midtrans;

use App\Models\TransactionPayments;

class Notification extends Midtrans
{
    protected $notification;
    protected $transactionId;
    protected $transaction;

    /**
     * Default options for every request
     */
    public $curlOptions = [];

    const SANDBOX_BASE_URL = 'https://api.sandbox.midtrans.com/v2';
    const PRODUCTION_BASE_URL = 'https://api.midtrans.com/v2';

    public function __construct($transactionId) {
        parent::__construct();

        $this->transactionId = $transactionId;
        $this->handleNotification();
    }

    /**
     * @return string CallbackService API URL, depens on midtrans status
     */
    public function getBaseUrl()
    {
        return $this->isProduction ? self::PRODUCTION_BASE_URL : self::SANDBOX_BASE_URL;
    }

    /**
	 * Send GET request
	 * @param string  $url
	 * @param string  $server_key
	 * @param mixed[] $data_hash
	 */
	public function get($url, $server_key, $data_hash)
	{
	    return $this->remoteCall($url, $server_key, $data_hash, false);
	}

	/**
	 * Send POST request
	 * @param string  $url
	 * @param string  $server_key
	 * @param mixed[] $data_hash
	 */
	public function post($url, $server_key, $data_hash)
	{
	    return $this->remoteCall($url, $server_key, $data_hash, true);
	}

  	/**
	 * Actually send request to API server
	 * @param string  $url
	 * @param string  $server_key
	 * @param mixed[] $data_hash
	 * @param bool    $post
	 */
    public function remoteCall($url, $server_key, $data_hash, $post = true)
    {

	    $ch = curl_init();

	    $curl_options = array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Basic ' . base64_encode($server_key . ':')
            ),
            CURLOPT_RETURNTRANSFER => 1,
	    );

	    // merging with Veritrans_Config::$curlOptions
	    if (count($this->curlOptions)) {
            // We need to combine headers manually, because it's array and it will no be merged
            if ($this->curlOptions[CURLOPT_HTTPHEADER]) {
                $mergedHeders = array_merge($curl_options[CURLOPT_HTTPHEADER], $this->curlOptions[CURLOPT_HTTPHEADER]);
                $headerOptions = array( CURLOPT_HTTPHEADER => $mergedHeders );
            } else {
                $mergedHeders = array();
            }

            $curl_options = array_replace_recursive($curl_options, $this->curlOptions, $headerOptions);
	    }

	    if ($post) {
            $curl_options[CURLOPT_POST] = 1;

            if ($data_hash) {
                $body = json_encode($data_hash);
                $curl_options[CURLOPT_POSTFIELDS] = $body;
            } else {
                $curl_options[CURLOPT_POSTFIELDS] = '';
            }
	    }

	    curl_setopt_array($ch, $curl_options);

	    $result = curl_exec($ch);
	    // curl_close($ch);

	    if ($result === FALSE) {
	        throw new \Exception('CURL Error: ' . curl_error($ch), curl_errno($ch));
	    }
	    else {
	        $result_array = json_decode($result);
            if (!in_array($result_array->status_code, array(200, 201, 202, 407))) {
                $message = 'Veritrans Error (' . $result_array->status_code . '): ' . $result_array->status_message;
                throw new \Exception($message, $result_array->status_code);
            }
            else {
                return $result_array;
            }
	    }
    }

    public function isSignatureKeyVerified()
    {
        return ($this->_createLocalSignatureKey() == $this->notification->signature_key);
    }

    public function isSuccess()
    {
        $statusCode = $this->notification->status_code;
        $transactionStatus = $this->notification->transaction_status;
        $fraudStatus = !empty($this->notification->fraud_status) ? ($this->notification->fraud_status == 'accept') : true;

        return ($statusCode == 200 && $fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement'));
    }

    public function isExpire()
    {
        return ($this->notification->transaction_status == 'expire');
    }

    public function isCancelled()
    {
        return ($this->notification->transaction_status == 'cancel');
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function getTransaction()
    {
        return $this->transaction;
    }

    protected function _createLocalSignatureKey()
    {
        $transactionId = $this->transactionId;
        $statusCode = $this->notification->status_code;
        $grossAmount = $this->transaction->price;
        $serverKey = $this->serverKey;
        $input = $transactionId . $statusCode . $grossAmount . $serverKey;
        $signature = openssl_digest($input, 'sha512');

        return $signature;
    }

    /**
   	* Retrieve transaction status
   	* @param string $id Order ID or transaction ID
    * @return mixed[]
    */
	protected function handleNotification()
    {
        $this->notification = $this->get(
            $this->getBaseUrl() . '/' . $this->transactionId . '/status',
            $this->serverKey,
            false
        );

        $this->transaction = TransactionPayments::where('transaction_id', $this->transactionId)->first();
    }
}