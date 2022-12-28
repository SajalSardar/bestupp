<?php

namespace App\Services;

class SendSMS {
    /**
     * store sms baseurl
     *
     * @property $baseURL
     */
    public $baseURL;

    /**
     * Store sms api key for access sms service
     * @property $apikey
     */
    public $apiKey;

    /**
     * Store sms sender id for verify;
    */
    public $senderId;

    public function __construct()
    {
        $this->baseURL = config('app.smsBaseUrl');
        $this->apiKey = config('app.smsApiKey');
        $this->senderId = config('app.smsSenderId');
    }

    function send_sms($number, $message) {
        $url = $this->baseURL;
        $data = [
            'api_key' => $this->apiKey,
            'type' => 'text',
            'contacts' => $number,
            'senderid' => $this->senderId,
            'msg' => $message,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
