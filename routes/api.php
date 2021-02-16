<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['namespace' => 'Api', 'as' => 'api.'], function (){
    Route::group(['prefix' => 'paypal', 'as' => 'paypal.'], function (Router $router){
        $router->get('/success', 'PayPalController@actionSuccess')->name('success');
        $router->get('/cancel', 'PayPalController@actionCancel')->name('cancel');
    });
});


