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

    public function show($id){
        $comment = (new VideoComments())
            ->with(['relationUsers']);
        $comment = $comment
            ->where('id', '=', $id)
            ->first();

        if(is_null($comment))
            return redirect()->back()->with('error', 'Not found');

        return view('pages.admin.comments.video.show', [
            'comment' => $comment,
        ]);
    }

    public function update($id, Request $request){
        $comment = (new VideoComments());
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
