<?php


namespace App\Http\Models\Video;


use Illuminate\Database\Eloquent\Model;

/**
 * Class VideoSnapshots
 * @package App\Http\Models\Video
 * @property int $id
 * @property String $path
 * @property String $filename
 * @property String $ext
 * @property String $created_at
 * @property String $updated_at
 */
class VideoSnapshots extends Model
{
    protected $table = 'video_snapshots';

    /**
     * @param array $data
     * @return bool
     */
    public function insertItem($data = []){
        $this->path = $data['path'];
        $this->filename = $data['file'];
        $this->ext = $data['extension'];
        return $this->save();
    }

    /**
     * @return string
     */
    public function getUrl(){
        return '/images/'.$this->path.$this->filename.'.'.$this->ext;
    }
}
