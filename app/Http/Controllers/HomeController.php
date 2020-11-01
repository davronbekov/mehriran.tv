<?php

namespace App\Http\Controllers;

use App\Http\Models\News\News;
use Illuminate\Http\Request;

class HomeController extends WebController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function actionIndex(){
        /**
         * @var News $news
         */
        $news = app(News::class);
        $news = $news
            ->getItemsList(4, app()->getLocale());

        return view('pages.home', [
            'news' => $news,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actionAbout(){
        return view('pages.about');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actionVideos(){
        return view('pages.videos');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actionDocumentaries(){
        return view('pages.documentaries');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actionNews(){
        return view('pages.news');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actionContacts(){
        return view('pages.contacts');
    }
}
