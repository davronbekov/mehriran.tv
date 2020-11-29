<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class PlaylistController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create(){
        return view('pages.admin.playlist.create');
    }
}
