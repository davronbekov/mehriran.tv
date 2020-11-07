<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\WebController;
use App\Http\Models\News\News;

class NewsController extends WebController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        /**
         * @var News $news
         */
        $news = app(News::class);
        $news = $news
            ->getItemsList(18, app()->getLocale());

        return view('pages.news',[
            'news' => $news,
        ]);
    }

    public function show($id){

    }
}
