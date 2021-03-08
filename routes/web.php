<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Admin routes
 */
Route::prefix('admin')->namespace('Admin')->middleware('admin')->as('admin.')->group(function(Router $router){
    $router->resource('main', 'MainController');
    $router->resource('news', 'NewsController');
    $router->resource('video', 'VideoController');
    $router->resource('documentary', 'DocumentaryController');
    $router->resource('subscribers', 'SubscribersController');
    $router->resource('feedbacks', 'FeedbacksController');
    $router->resource('playlist', 'PlaylistController');

    $router->resource('video_params', 'VideoParamsController');

    Route::prefix('filebrowser')->as('filebrowser.')->group(function (Router $router){
        $router->get('/', '\Crowles\FileBrowser\FileBrowserController@index')->name('index');
        $router->get('/scan', '\Crowles\FileBrowser\FileBrowserController@scan')->name('scan');
    });

    Route::prefix('files')->as('files.')->group(function (Router $router){
        $router->get('attach', 'FilesController@actionAttach')->name('attach');
    });

    Route::prefix('comments')->namespace('Comments')->as('comments.')->group(function (Router $router){
        $router->resource('news','NewsController');
        $router->resource('video','VideoController');
    });
});

/**
 * Authentication routes
 */
Route::prefix('auth')->group(function(Router $router){
    Auth::routes();
});

/**
 * Page routes
 */
Route::prefix('{lang?}')->middleware('locale')->group(function() {

    Route::get('/', 'HomeController@actionIndex')->name('home');
    Route::get('/home', 'HomeController@actionIndex')->name('home'); //same as main page
    Route::get('/about', 'HomeController@actionAbout')->name('about');
    Route::get('/videos', 'HomeController@actionVideos')->name('videos');
    Route::get('/documentaries', 'HomeController@actionDocumentaries')->name('documentaries');
    Route::get('/contacts', 'HomeController@actionContacts')->name('contacts');
    Route::post('/feedback', 'HomeController@actonFeedback')->name('feedback');

    Route::get('/search', 'HomeController@actionSearch')->name('search');

    Route::prefix('news')->namespace('Web')->as('news.')->group(function (Router $router){
        $router->get('/', 'NewsController@index')->name('index');
        $router->get('/show/{id}', 'NewsController@show')->name('show');
    });
    Route::prefix('articles')->namespace('Web')->as('articles.')->group(function (Router $router){
        $router->get('/', 'ArticlesController@index')->name('index');
        $router->get('/show/{id}', 'ArticlesController@show')->name('show');
    });

    Route::prefix('comments')->namespace('Web')->as('comments.')->group(function (Router $router){
        $router->put('addNews', 'CommentsController@actionAddNews')->name('addNews');
        $router->put('addVideo', 'CommentsController@actionaddVideo')->name('addVideo');
    });

    Route::prefix('profile')->namespace('Web')->middleware('auth')->as('profile.')->group(function(Router $router){
        $router->get('/', 'ProfileController@actionIndex')->name('index');
        $router->get('/changePassword', 'ProfileController@actionChangePassword')->name('changePassword');
        $router->put('/updatePassword', 'ProfileController@actionUpdatePassword')->name('updatePassword');
    });

});




