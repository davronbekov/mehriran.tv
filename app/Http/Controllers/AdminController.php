<?php


namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function __construct()
    {

    }

    protected $languages = [
        'ru' => 'Русский',
        'en' => 'English',
    ];
}
