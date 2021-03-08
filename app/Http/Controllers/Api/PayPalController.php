<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Http\Libs\PayPalUtils;
use App\Http\Models\Users\Payments;
use App\Http\Models\Users\UserVideos;
use App\Http\Models\Video\VideoParams;
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
                $payments->updateItem(['status' => $result['status']]);

                /**
                 * @var VideoParams $videoParam
                 */
                $videoParam = app(VideoParams::class);
                $videoParam = $videoParam->getItem($payments->tariff_id);

                $expire_time = 0;
                switch ($videoParam->type){
                    case 'rent':
                        $expire_time = time() + ($videoParam->days*86400);
                        break;
                }

                /**
                 * @var UserVideos $userVideo
                 */
                $userVideo = app(UserVideos::class);
                $userVideo->insertItem([
                    'user_id' => $payments->user_id,
                    'file_id' => $videoParam->file_id,
                    'type' => $videoParam->type,
                    'expire_time' => $expire_time,
                ]);

                return redirect('/')->with('success', 'Payment was successful');
            case 'PAYER_ACTION_REQUIRED': //redirect
                return redirect($result['approve_link']);
        }
    }

    public function actionCancel(Request $request){

    }

    public function actionCreate(Request $request){
        $userId = $request->input('user_id');
        $paramId = $request->input('tariff_id');

        /**
         * @var VideoParams $videoParam
         */
        $videoParam = app(VideoParams::class);
        $videoParam = $videoParam->getItem($paramId);
        if(is_null($videoParam))
            return [
                'token' => null,
            ];

        $paypal = new PayPalUtils();
        $token = $paypal->createOrder(['cost' => $videoParam->price]);

        if(!is_null($token)){
            $payments = new Payments();
            $payments->insertItem([
                'status' => 'CREATED',
                'user_id' => $userId,
                'tariff_id' => $paramId,
                'token' => $token,
                'amount' => $videoParam->price,
            ]);
        }

        return [
            'token' => $token,
        ];
    }
}
