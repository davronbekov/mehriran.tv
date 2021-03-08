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
 * @property String $type
 * @property int $days
 * @property int $is_visible
 * @property String $created_at
 * @property String $updated_at
 */
class VideoParams extends Model
{
    protected $table = 'video_params';

    /**
     * @param null $file_id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|null
     */
    public function getItems($file_id = null){
        if(is_null($file_id))
            return null;

        return parent::query()
            ->where('file_id', '=', $file_id)
            ->get();
    }

    /**
     * @param null $id
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function getItem($id = null){
        if(is_null($id))
            return null;

        return parent::query()
            ->where('id', '=', $id)
            ->first();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insertItem($data = []){
        $this->file_id = $data['file_id'] ?? null;
        $this->price = $data['price'] ?? 0;
        $this->type = $data['type'] ?? 'buy';
        $this->days = $data['days'] ?? 0;
        $this->is_visible = $data['is_visible'] ?? 0;
        return $this->save();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateItem($data = []){
        $this->price = $data['price'] ?? 0;
        $this->type = $data['type'] ?? 'buy';
        $this->days = $data['days'] ?? 0;
        $this->is_visible = $data['is_visible'] ?? 0;
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
