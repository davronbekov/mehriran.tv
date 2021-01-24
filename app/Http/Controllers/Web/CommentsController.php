<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\WebController;
use App\Http\Models\News\NewsComments;
use App\Http\Models\Video\VideoComments;
use Illuminate\Http\Request;

class CommentsController extends WebController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionAddNews(Request $request)
    {
        $request->validate([
            'news_id' => 'required',
            'comment' => 'required',
        ]);

        $data = [
            'user_id' => $request->user()->id,
            'news_id' => $request->input('news_id'),
            'comment' => $request->input('comment'),
        ];

        /**
         * @var NewsComments $newsComments
         */
        $newsComments = app(NewsComments::class);
        $newsComments = $newsComments->insertItem($data);
        if($newsComments)
            return redirect()->back()->with('success', 'Your comment sent to further moderation step');
        else
            return redirect()->back()->with('error', 'Something wrong happened, please try later');

    }

    public function actionAddVideo(Request $request){
        $request->validate([
            'file_id' => 'required',
            'comment' => 'required',
        ]);

        $data = [
            'user_id' => $request->user()->id,
            'file_id' => $request->input('file_id'),
            'comment' => $request->input('comment'),
        ];

        /**
         * @var VideoComments $videoComments
         */
        $videoComments = app(VideoComments::class);
        $videoComments = $videoComments->insertItem($data);
        if($videoComments)
            return redirect()->back()->with('success', 'Your comment sent to further moderation step');
        else
            return redirect()->back()->with('error', 'Something wrong happened, please try later');
    }
}
