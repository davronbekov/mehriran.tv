<?php

namespace App\Http\Controllers;

use App\Http\Libs\PayPalUtils;
use App\Http\Models\Feedbacks;
use App\Http\Models\News\News;
use App\Http\Models\Playlist;
use App\Http\Models\Subscribers;
use App\Http\Models\Video\VideoFiles;
use Illuminate\Http\Request;

class HomeController extends WebController
{

    public function __construct()
    {
        parent::__construct();
    }

       public function actionIndex(Request $request){
        /**
         * @var News $newsModel
         */
        $newsModel = app(News::class);
        $news = $newsModel
            ->getItemsList(4, app()->getLocale());
        $articles = $newsModel
           ->getItemsList(4, app()->getLocale(), 'article');

        /**
         * @var VideoFiles $files
         */
        $files = app(VideoFiles::class);
        $documentaries = $files->getItemsByLanguage('documentary', 6, app()->getLocale());
        $videos = $files->getItemsByLanguage('video', 6, app()->getLocale());

        $search = $request->input('search', null);
        if(!empty($search)){
            return redirect(route('search', ['lang' => app()->getLocale()]).'?search='.$search);
        }

       $subscribe_action = false;
       $feedback_action = false;
        switch ($request->input('button', null)){
            case 'subscribe':
                /**
                 * @var Subscribers $subscribers
                 */
                $subscribers = app(Subscribers::class);
                $subscribersCheck = $subscribers->getItem($request->input('email'));
                if(is_null($subscribersCheck))
                    $subscribe_action = $subscribers->insertItem($request->input('email'));

                break;
            case 'search':
                return redirect(route('search', ['lang' => app()->getLocale()]).'?search='.$search);
            case 'feedback':
                $feedback_action = true;
                break;
        }

       /**
        * @var Playlist $playlist
        */
        $playlist = app(Playlist::class);
        $playlist = $playlist->getItems();

        return view('pages.home', [
            'news' => $news,
            'articles' => $articles,
            'documentaries' => $documentaries,
            'videos' => $videos,
            'subscribe_action' => $subscribe_action,
            'feedback_action' => $feedback_action,
            'playlist' => $playlist,
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
    public function actionContacts(){
        return view('pages.contacts');
    }

    public function actionSearch(Request $request){
        $word = $request->input('search', null);
        $news = null;
        $documentaries = null;
        $videos = null;

        if(!is_null($word)){
            $news = app(News::class)
                ->getFilteredItems(
                    [
                        'word' => $word,
                    ], app()->getLocale()
                );

            /**
             * @var VideoFiles $documentaries
             */
            $documentaries = app(VideoFiles::class)
                ->getFilteredItems(
                    [
                        'word' => $word,
                    ],
                    'documentary',
                    app()->getLocale()
                );

            /**
             * @var VideoFiles $videos
             */
            $videos = app(VideoFiles::class)
                ->getFilteredItems(
                    [
                        'word' => $word,
                    ],
                    'video',
                    app()->getLocale()
                );
        }

        return view('pages.search', [
            'news' => $news,
            'documentaries' => $documentaries,
            'videos' => $videos,
        ]);
    }

    public function actonFeedback(Request $request){
        if($request->isMethod('post')){
            /**
             * @var Feedbacks $feedbacks
             */
            $feedbacks = app(Feedbacks::class);
            $status = $feedbacks->insertItem([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'text' => $request->input('text'),
            ]);

            if($status)
                return redirect(route('home', ['lang' => app()->getLocale()]).'?button=feedback');
        }

        return redirect(route('home', ['lang' => app()->getLocale()]));
    }
}
