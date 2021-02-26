<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Http\Libs\PayPalUtils;
use App\Http\Models\Users\Payments;
use Illuminate\Http\Request;

class PayPalController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionSuccess(Request $request){
        $paypal = new PayPalUtils();
        $result = $paypal->showOrder($request->input('token'));

        $payments = new Payments();
        $payments = $payments->getItem($request->input('token'));
        if(is_null($payments))
            return redirect('/');

        switch ($result['status']){
            case 'APPROVED':
            case 'COMPLETED':
                //success

                break;
            case 'PAYER_ACTION_REQUIRED': //redirect
                break;
        }
    }

    public function actionCancel(Request $request){

    }

    public function actionCreate(Request $request){
        $userId = $request->input('user_id');
        $fileId = $request->input('file_id');
        $amount = $request->input('amount');

        $paypal = new PayPalUtils();
        $token = $paypal->createOrder(['cost' => $amount]);

        if(!is_null($token)){
            $payments = new Payments();
            $payments->insertItem([
                'current_status' => 'CREATED',
                'user_id' => $userId,
                'file_id' => $fileId,
                'token' => $token,
                'amount' => $amount,
            ]);
        }

        return [
            'token' => $token,
        ];
    }
}
