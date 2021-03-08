<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\WebController;
use App\Http\Models\Video\VideoFiles;
use Illuminate\Http\Request;

class FilesController extends WebController
{
    public function __construct()
    {
        parent::__construct();
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

        return view('pages.files.videos', [
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

        return view('pages.files.documentaries', [
            'documentaries' => $documentaries,
        ]);
    }

    public function actionTickets($language, $file_id, Request $request){
        /**
         * @var VideoFiles $videoFile
         */
        $videoFile = app(VideoFiles::class);
        $videoFile = $videoFile->getItem($file_id);
        if(is_null($videoFile)){
            return redirect()->back()->with('error', 'not found');
        }

        return view('pages.files.tickets', [
            'videoFile'     => $videoFile,
            'videoParams'   => $videoFile->relationParams,
        ]);
    }

}
