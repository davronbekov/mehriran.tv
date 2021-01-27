<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use App\Http\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        /**
         * @var Playlist $playlist
         */
        $playlist = app(Playlist::class);
        $playlist = $playlist->getItems();
        return view('pages.admin.playlist.index', [
            'playlist' => $playlist,
        ]);
    }

    public function create(){
        return view('pages.admin.playlist.create');
    }

    public function edit($id){
        /**
         * @var Playlist $playlist
         */
        $playlist = app(Playlist::class);
        $playlist = $playlist->getItem($id);
        if(is_null($playlist))
            return redirect(route('admin.playlist.index'))->with('error', 'Not found!');

        return view('pages.admin.playlist.edit', [
            'playlist' => $playlist,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'path' => 'required',
            'filename' => 'required',
            'ext' => 'required',

            'duration' => 'required',
            'starts' => 'required|min:5|max:5',
        ]);

        /**
         * @var Playlist $playlist
         */
        $playlist = app(Playlist::class);
        $status = $playlist->insertItem($request->all());

        if($status)
            return redirect(route('admin.playlist.index'))->with('success', 'Added successfully');

        return redirect(route('admin.playlist.index'))->with('error', 'Something went wrong, try later!');
    }

    public function update($id, Request $request){
        $request->validate([
            'path' => 'required',
            'filename' => 'required',
            'ext' => 'required',

            'duration' => 'required',
            'starts' => 'required|min:5|max:5',
        ]);

        /**
         * @var Playlist $playlist
         */
        $playlist = app(Playlist::class);
        $playlist = $playlist->getItem($id);
        if(is_null($playlist))
            return redirect(route('admin.playlist.index'))->with('error', 'Not found!');

        $status = $playlist->updateItem($request->all());

        if($status)
            return redirect(route('admin.playlist.index'))->with('success', 'Updated successfully');

        return redirect(route('admin.playlist.index'))->with('error', 'Something went wrong, try later!');
    }

    public function destroy($id){
        /**
         * @var Playlist $playlist
         */
        $playlist = app(Playlist::class);
        $playlist = $playlist->getItem($id);
        if(is_null($playlist))
            return redirect(route('admin.playlist.index'))->with('error', 'Not found!');

        $status = $playlist->deleteItem();

        if($status)
            return redirect(route('admin.playlist.index'))->with('success', 'Deleted successfully');

        return redirect(route('admin.playlist.index'))->with('error', 'Something went wrong, try later!');
    }
}
