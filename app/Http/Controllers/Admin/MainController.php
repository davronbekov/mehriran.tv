<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\AdminController;

class MainController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        return view('pages.admin.main.index');
    }
}
