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

        $network->makeRequest();
//        $network->debugResponse();

        dd(
            $network->getParam('access_token'),
            $network->getParam('app_id')
        );
    }
}
