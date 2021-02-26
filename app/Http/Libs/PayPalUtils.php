<?php


namespace App\Http\Libs;

class PayPalUtils
{
    private $url = 'https://api-m.sandbox.paypal.com';

    public function getToken(){
        $network = new CallbackGenerator();

        $network->setLink($this->url.'/v1/oauth2/token');
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

        $network->setLink($this->url.'/v2/checkout/orders');
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
            'application_context' => [
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

    public function showOrder($id = null){
        $network = new CallbackGenerator();

        $network->setLink($this->url.'/v2/checkout/orders/'.$id);
        $network->setHeaders([
            'Accept' => 'application/json',
            'Accept-Language' => 'en_US',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->getToken(),
        ]);

        $network->setMethod('get');
        $network->makeRequest();

        $approveLink = '';
        $payer = [];

        $status = $network->getParam('status');
        switch ($status){
            case 'APPROVED':
            case 'COMPLETED':
                //success
                $user = $network->getParam('payer');
                if(!is_null($user)){
                    $name = $user->name;
                    $payer = [
                        'name'  => $name->given_name.' '.$name->surname,
                        'email' => $user->email_address,
                        'country_code' => $user->address ? $user->address->country_code : null,
                    ];
                }
                break;
            case 'PAYER_ACTION_REQUIRED':
                //redirect user
                $links = $network->getParam('links');
                foreach ($links as $link) {
                    if($link->rel == 'approve'){
                        $approveLink = $link->rel;
                    }
                }
                break;
        }

        return [
            'token'     => $id,
            'status' => $status,
            'payer'  => $payer,
            'approve_link' => $approveLink,
        ];
    }
}
