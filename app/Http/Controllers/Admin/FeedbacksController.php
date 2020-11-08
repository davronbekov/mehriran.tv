<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Http\Models\Feedbacks;

class FeedbacksController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        /**
         * @var Feedbacks $feedbacks
         */
        $feedbacks = app(Feedbacks::class);
        $feedbacks = $feedbacks->getItems();

        return view('pages.admin.feedbacks.index', [
            'feedbacks' => $feedbacks,
        ]);
    }

    public function show($id){
        /**
         * @var Feedbacks $feedbacks
         */
        $feedback = app(Feedbacks::class);
        $feedback = $feedback->getItem($id);

        if(is_null($feedback))
            return redirect('admin.feedbacks.index');

        return view('pages.admin.feedbacks.show', [
            'feedback' => $feedback,
        ]);
    }
}
