<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Http\Models\News\News;
use App\Http\Models\News\NewsParams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        /**
         * @var News $news
         */
        $news = app(News::class);
        $news = $news->getItems();

        return view('pages.admin.news.index', [
            'news' => $news,
        ]);
    }

    public function create(){
        return view('pages.admin.news.create');
    }

    public function edit($id, Request $request){
        /**
         * @var News $news
         */
        $news = app(News::class);
        $news = $news->getItem($id);

        return view('pages.admin.news.edit', [
            'news' => $news,
            'languages' => $this->languages,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'identify' => 'required',
        ]);

        /**
         * @var News $news
         */
        $news = app(News::class);
        $status = $news->insertOrUpdate([
            'identify' => $request->input('identify')
        ]);

        if($status)
            return redirect(route('admin.news.edit', [$news->id, $request->getLocale()]));

        return redirect(route('admin.news.create'));
    }

    public function update($id, Request $request){
        /**
         * @var NewsParams $newsParams
         */
        $newsParamsModel = app(NewsParams::class);
        $newsParams = $newsParamsModel->getItem($id, $request->input('language'));
        if(is_null($newsParams))
            $newsParams = $newsParamsModel;

        $status = $newsParams->insertOrUpdateItem([
            'news_id' => $id,
            'language' => $request->input('language'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if($status)
            Session::put('success', 'Success');
        else
            Session::put('error', 'Try again!');

        return redirect(route('admin.news.edit', $id));
    }

    public function destroy($id, Request $request){
        /**
         * @var NewsParams $newsParams
         */
        $newsParams = app(NewsParams::class);
        $newsParams = $newsParams->getItem($id, $request->input('language'));

        if(!is_null($newsParams))
            $newsParams->deleteItem();

        return redirect(route('admin.news.edit', $id));
    }
}
