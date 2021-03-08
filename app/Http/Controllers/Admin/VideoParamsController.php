<?php


namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Controllers\AdminController;
use App\Http\Models\Video\VideoParams;
use Illuminate\Http\Request;

class VideoParamsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store(Request $request){
        $request->validate([
            'is_visible'    => 'required',
            'type'          => 'required',
            'file_id'       => 'required',
            'price'         => 'required',
            'file_type'     => 'required',
        ]);

        try{
            /**
             * @var VideoParams $videoParams
             */
            $videoParams = app(VideoParams::class);
            $videoParams->insertItem([
                'is_visible'    => $request->input('is_visible', 0),
                'type'          => $request->input('type', 'buy'),
                'file_id'       => $request->input('file_id', null),
                'price'         => $request->input('price', 0),
                'days'          => $request->input('days', 0),
            ]);

            return redirect(route('admin.'.$request->input('file_type', 'video').'.edit', $request->input('file_id')))->with('success', 'Success');
        }catch (Exception $exception){
            return redirect(route('admin.'.$request->input('file_type', 'video').'.edit', $request->input('file_id')))->with('error', $exception->getMessage());
        }
    }

    public function update($id, Request $request){
        $request->validate([
            'is_visible'    => 'required',
            'type'          => 'required',
            'price'         => 'required',
            'file_type'     => 'required',
        ]);

        /**
         * @var VideoParams $videoParams
         */
        $videoParams = app(VideoParams::class);
        $videoParams = $videoParams->getItem($id);
        if(is_null($videoParams)){
            return redirect(route('admin.'.$request->input('file_type', 'video').'.index'))->with('error', 'Item not found');
        }

        try{

            $videoParams->updateItem([
                'is_visible'    => $request->input('is_visible', 0),
                'type'          => $request->input('type', 'buy'),
                'price'         => $request->input('price', 0),
                'days'          => $request->input('days', 0),
            ]);

            return redirect(route('admin.'.$request->input('file_type', 'video').'.edit', $videoParams->file_id))->with('success', 'Success');
        }catch (Exception $exception){
            return redirect(route('admin.'.$request->input('file_type', 'video').'.edit', $videoParams->file_id))->with('error', $exception->getMessage());
        }
    }

    public function destroy($id, Request $request){
        /**
         * @var VideoParams $videoParams
         */
        $videoParams = app(VideoParams::class);
        $videoParams = $videoParams->getItem($id);
        if(is_null($videoParams)){
            return redirect(route('admin.'.$request->input('file_type', 'video').'.index'))->with('error', 'Item not found');
        }

        $file_id = $videoParams->file_id;
        try{
            $videoParams->deleteItem();

            return redirect(route('admin.'.$request->input('file_type', 'video').'.edit', $file_id))->with('success', 'Success');
        }catch (Exception $exception){
            return redirect(route('admin.'.$request->input('file_type', 'video').'.edit', $file_id))->with('error', $exception->getMessage());
        }

    }
}
