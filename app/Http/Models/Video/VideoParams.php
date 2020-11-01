<?php


namespace App\Http\Models\Video;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

/**
 * Class VideoParams
 * @package App\Http\Models\Video
 * @property int $id
 * @property int $file_id
 * @property int $price
 * @property String $title
 * @property String $description
 * @property String $created_at
 * @property String $updated_at
 */
class VideoParams extends Model
{
    protected $table = 'video_params';

    /**
     * @param null $file_id
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function getItem($file_id = null){
        if(is_null($file_id))
            return null;

        return parent::query()
            ->where('file_id', '=', $file_id)
            ->first();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insertItem($data = []){
        $this->file_id = $data['file_id'];
        $this->price = $data['price'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        return $this->save();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateItem($data = []){
        $this->price = $data['price'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        return $this->save();
    }

    /**
     * @return bool
     */
    public function deleteItem(){
        try{
            $this->delete();

            return true;
        }catch (Exception $exception){
            Session::put('error', $exception->getMessage());
        }

        return false;
    }
}
