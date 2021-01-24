<?php


namespace App\Http\Controllers\Admin\Comments;


use App\Http\Controllers\AdminController;
use App\Http\Models\News\NewsComments;
use Illuminate\Http\Request;

class NewsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request){
        $comments = (new NewsComments())
                ->with(['relationUsers', 'relationNews']);
        $comments = $comments
            ->orderBy('id', 'desc')
            ->paginate(18);

        return view('pages.admin.comments.news.index', [
            'comments' => $comments,
        ]);
    }
}
