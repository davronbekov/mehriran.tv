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

    public function show($id){
        $comment = (new NewsComments())
            ->with(['relationUsers']);
        $comment = $comment
            ->where('id', '=', $id)
            ->first();

        if(is_null($comment))
            return redirect()->back()->with('error', 'Not found');

        return view('pages.admin.comments.news.show', [
            'comment' => $comment,
        ]);
    }

    public function update($id, Request $request){
        $comment = (new NewsComments());
        $comment = $comment
            ->where('id', '=', $id)
            ->first();

        if(is_null($comment))
            return redirect()->back()->with('error', 'Not found');

        $comment->visible = $request->input('visible');
        $comment = $comment->save();

        if($comment)
            return redirect()->back()->with('success', 'Changed');
        else
            return redirect()->back()->with('error', 'Something went wrong, try later');
    }
}
