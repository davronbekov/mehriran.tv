<?php


namespace App\Http\Libs;

use Illuminate\Support\Facades\File;

class ImagesUploader
{
    public $GLOBAL_PATH = '/images/';

    private $paths = [
        'snapshots'         => 'snapshots',
    ];

    private $file = null;
    private $file_name = null;
    private $file_ext = null;

    private $type = null;
    private $folder = null;

    public $file_url_ext = null;
    public $is_from_url = false;

    private function setName(){
        $this->file_name = md5(uniqid(time(), true));
    }

    private function setExt(){
        if($this->is_from_url)
            $this->file_ext = $this->file_url_ext;
        else
            $this->file_ext = $this->file->getClientOriginalExtension();
    }

    private function setFolder(){
        $this->folder = $this->paths[$this->type].'/'.date('Y/m/d').'/';
    }

    private function getFullPath() : String{
        return public_path($this->GLOBAL_PATH).$this->folder;
    }

    private function getFullFilePath() : String{
        return $this->getFullPath().$this->file_name.'.'.$this->file_ext;
    }

    public function getInfo() : array{
        return [
            'path' => $this->folder,
            'file' => $this->file_name,
            'extension' => $this->file_ext,
            'md5' => md5($this->folder.$this->file_name.$this->file_ext),
        ];
    }

    public function setFile($file){
        $this->file =  $file;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function saveFile(){
        $this->setFolder();
        $this->setName();
        $this->setExt();

        if(!File::exists($this->getFullFilePath())){
            File::makeDirectory($this->getFullPath(), 0777, true, true);

            if($this->is_from_url)
                file_put_contents($this->getFullPath().$this->file_name.'.'.$this->file_ext, $this->file);
            else
                $this->file->move($this->getFullPath(), $this->file_name.'.'.$this->file_ext);
        }
    }
}
