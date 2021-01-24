<?php


namespace App\Http\Controllers\Admin\Comments;


use App\Http\Controllers\AdminController;
use App\Http\Models\Video\VideoComments;
use Illuminate\Http\Request;

class VideoController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request){
        $comments = (new VideoComments())
            ->with(['relationUsers', 'relationFile']);
        $comments = $comments
            ->orderBy('id', 'desc')
            ->paginate(18);

        return view('pages.admin.comments.video.index', [
            'comments' => $comments,
        ]);
    }
}
