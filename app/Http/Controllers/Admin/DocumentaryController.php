<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Http\Libs\ImagesUploader;
use App\Http\Models\Video\VideoFiles;
use App\Http\Models\Video\VideoParams;
use App\Http\Models\Video\VideoSnapshots;
use Illuminate\Http\Request;

class DocumentaryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    private $type = 'documentary';

    public function index(){
        /**
         * @var VideoFiles $videoFiles
         */
        $videoFiles = app(VideoFiles::class);
        $videoFiles = $videoFiles->getItems($this->type, 18);
        return view('pages.admin.documentary.index', [
            'videoFiles' => $videoFiles,
        ]);
    }

    public function edit($id){
        /**
         * @var VideoFiles $videoFiles
         */
        $videoFiles = app(VideoFiles::class);
        $videoFiles = $videoFiles->getItem($id);

        /**
         * @var VideoParams $videoParams
         */
        $videoParams = app(VideoParams::class);
        $videoParams = $videoParams->getItems($id);

        return view('pages.admin.documentary.edit', [
            'languages' => $this->languages,
            'videoFile' => $videoFiles,
            'videoParams' => $videoParams,
        ]);
    }

    public function create(){
        return view('pages.admin.documentary.create', [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'path' => 'required',
            'filename' => 'required',
            'ext' => 'required',
            'language' => 'required',
            'title' => 'required',
            'description' => 'required',
            'snapshot' => 'required',
        ]);

        $data = $request->all();
        unset($data['_token']);

        if($request->hasFile('snapshot')){
            $imagesUploader = new ImagesUploader();
            $imagesUploader->setFile($request->file('snapshot'));
            $imagesUploader->setType('snapshots');
            $imagesUploader->saveFile();
            $image_data = $imagesUploader->getInfo();

            /**
             * @var VideoSnapshots $snapshot
             */
            $snapshot = app(VideoSnapshots::class);
            $snapshot->insertItem($image_data);

            $data['snapshot_id'] = $snapshot->id;
            unset($data['snapshot']);
        }

        $data['type'] = $this->type;

        /**
         * @var VideoFiles $videoFiles
         */
        $videoFiles = app(VideoFiles::class);
        $videoFiles->insertItem($data);
        return redirect(route('admin.documentary.index'));
    }

    public function update($id, Request $request){
        $request->validate([
            'path' => 'required',
            'filename' => 'required',
            'ext' => 'required',
            'language' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        unset($data['_token']);

        if($request->hasFile('snapshot')){
            $imagesUploader = new ImagesUploader();
            $imagesUploader->setFile($request->file('snapshot'));
            $imagesUploader->setType('snapshots');
            $imagesUploader->saveFile();
            $image_data = $imagesUploader->getInfo();

            /**
             * @var VideoSnapshots $snapshot
             */
            $snapshot = app(VideoSnapshots::class);
            $snapshot->insertItem($image_data);

            $data['snapshot_id'] = $snapshot->id;
            unset($data['snapshot']);
        }

        $data['type'] = $this->type;

        /**
         * @var VideoFiles $videoFiles
         */
        $videoFiles = app(VideoFiles::class);
        $videoFiles = $videoFiles->getItem($id);
        $videoFiles->updateItem($data);

        return redirect(route('admin.documentary.index'));
    }

    public function destroy($id){
        /**
         * @var VideoFiles $videoFiles
         */
        $videoFiles = app(VideoFiles::class);
        $videoFiles = $videoFiles->getItem($id);
        $videoFiles->deleteItem();

        /**
         * @var VideoParams $videoParams
         */
        $videoParams = app(VideoParams::class);
        $videoParams = $videoParams->getItems($id);
        foreach ($videoParams as $videoParam){
            $videoParam->deleteItem();
        }

        return redirect(route('admin.documentary.index'));
    }
}
