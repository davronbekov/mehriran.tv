<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PayPalController extends WebController
{

    protected $provider;

    public function __construct()
    {
        parent::__construct();
    }


    public function actionIndex(){

    }


}
