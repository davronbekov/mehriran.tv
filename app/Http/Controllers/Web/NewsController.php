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

        return view('pages.news.index',[
            'news' => $news,
        ]);
    }

    public function show($lang, $id){
        /**
         * @var News $news
         */
        $news = app(News::class);
        $news = $news->getItem($id);

        if(is_null($news))
            return redirect(route('news.index', ['lang' => app()->getLocale()]));

        return view('pages.news.show',[
            'news' => $news->relationParams->where('language', '=', $lang)->first(),
        ]);
    }
}
