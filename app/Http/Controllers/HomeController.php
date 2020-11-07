<?php

namespace App\Http\Controllers;

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
        }

        return view('pages.home', [
            'news' => $news,
            'documentaries' => $documentaries,
            'subscribe_action' => $subscribe_action,
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
        dd($request->all());
    }
}
