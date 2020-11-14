<?php

namespace App\Http\Controllers;

use App\Http\Models\Feedbacks;
use App\Http\Models\News\News;
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
         * @var News $news
         */
        $news = app(News::class);
        $news = $news
            ->getItemsList(4, app()->getLocale());

        /**
         * @var VideoFiles $documentaries
         */
        $documentaries = app(VideoFiles::class);
        $documentaries = $documentaries->getItemsByLanguage('documentary', 12, app()->getLocale());

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

        return view('pages.home', [
            'news' => $news,
            'documentaries' => $documentaries,
            'subscribe_action' => $subscribe_action,
            'feedback_action' => $feedback_action,
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
        /**
         * @var VideoFiles $videos
         */
        $videos = app(VideoFiles::class);
        $videos = $videos->getItemsByLanguage('video', 12, app()->getLocale());

        return view('pages.videos', [
            'videos' => $videos,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actionDocumentaries(){
        /**
         * @var VideoFiles $documentaries
         */
        $documentaries = app(VideoFiles::class);
        $documentaries = $documentaries->getItemsByLanguage('documentary', 12, app()->getLocale());

        return view('pages.documentaries', [
            'documentaries' => $documentaries,
        ]);
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
