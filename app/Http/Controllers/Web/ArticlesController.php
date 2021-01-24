<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\WebController;
use App\Http\Models\News\News;
use App\Http\Models\News\NewsComments;

class ArticlesController extends WebController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        /**
         * @var News $articles
         */
        $articles = app(News::class);
        $articles = $articles
            ->getItemsList(18, app()->getLocale(), 'article');

        return view('pages.articles.index',[
            'articles' => $articles,
        ]);
    }

    public function show($lang, $id){
        /**
         * @var News $article
         */
        $article = app(News::class);
        $article = $article->getItem($id);

        if(is_null($article))
            return redirect(route('articles.index', ['lang' => app()->getLocale()]));

        /**
         * @var NewsComments $comments
         */
        $comments = app(NewsComments::class);
        $comments = $comments->getItems($id);

        return view('pages.articles.show',[
            'article' => $article->relationParams->where('language', '=', $lang)->first(),
            'comments' => $comments,
        ]);
    }
}
