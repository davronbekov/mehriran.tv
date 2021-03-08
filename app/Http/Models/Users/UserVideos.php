<?php


namespace App\Http\Models\Users;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserVideos
 * @package App\Http\Models\Users
 * @property int $id
 * @property int $user_id
 * @property int $file_id
 * @property String $type
 * @property int $expire_time
 * @property String $created_at
 * @property String $updated_at
 */
class UserVideos extends Model
{
    protected $table = 'user_videos';

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
     * @param array $data
     * @return bool
     */
    public function insertItem($data = []){
        try{
            $this->user_id = $data['user_id'];
            $this->file_id = $data['file_id'];
            $this->type = $data['type'];
            $this->expire_time = $data['expire_time'];
            $this->save();

            return true;
        }catch (Exception $exception){
            return false;
        }
    }
}
