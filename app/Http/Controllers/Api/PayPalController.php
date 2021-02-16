<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class PayPalController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionSuccess(Request $request){

    }

    public function actionCancel(Request $request){

    }
}
