<?php


namespace App\Http\Libs;

class PayPalUtils
{
    public function getToken(){
        $network = new CallbackGenerator();

        $network->setLink('https://api-m.sandbox.paypal.com/v1/oauth2/token');
        $network->setHeaders([
            'Accept' => 'application/json',
            'Accept-Language' => 'en_US',
        ]);
        $network->setUsername(config('paypal.'.config('paypal.mode').'.client_id'));
        $network->setPassword(config('paypal.'.config('paypal.mode').'.client_secret'));

        $network->setParams([
            'grant_type' => 'client_credentials',
        ]);
        $network->setMethod('post');

        $network->makeRequest();

        return $network->getParam('access_token');
    }

    public function createOrder($data = []){
        $network = new CallbackGenerator();

        $network->setLink('https://api-m.sandbox.paypal.com/v2/checkout/orders');
        $network->setHeaders([
            'Accept' => 'application/json',
            'Accept-Language' => 'en_US',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->getToken(),
        ]);

        $network->setParams([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $data['cost'],
                    ]
                ]
            ],
            'order_application_context' => [
                'return_url' => route('api.paypal.success'),
                'cancel_url' => route('api.paypal.cancel'),
            ]
        ]);
        $network->setRaw(true);

        $network->makeRequest();

        if(Strings::isEqual('CREATED', $network->getParam('status')))
            return $network->getParam('id');
        else
            return false;
    }
}
