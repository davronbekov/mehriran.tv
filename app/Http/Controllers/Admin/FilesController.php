<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class FilesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionAttach(Request $request){
        $request->validate([
            'name' => 'required',
            'path' => 'required',
            'root' => 'required',
        ]);

        $object = $request->input('name');
        $object = explode('.', $object);

        $ext = '';
        foreach ($object as $item) {
            $ext = $item;
        }

        $name = $object[0];
        for ($i = 1; $i < count($object) - 1; $i++) {
            $name = $name.'.'.$object[$i];
        }

        $path = $request->input('root');

        $data = [
            'path' => $path,
            'name' => $name,
            'ext' => $ext,
        ];

        return view('pages.admin.files.attach', [
            'data' => $data,
        ]);
    }
}
