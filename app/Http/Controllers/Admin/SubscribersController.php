<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Http\Models\Subscribers;

class SubscribersController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        /**
         * @var Subscribers $subscribers
         */
        $subscribers = app(Subscribers::class);
        $subscribers = $subscribers->getItems();

        return view('pages.admin.subscribers.index', [
            'subscribers' => $subscribers,
        ]);
    }
}
