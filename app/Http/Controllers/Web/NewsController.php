<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\WebController;

class NewsController extends WebController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        return view('pages.news');
    }

    public function show($id){

    }
}
