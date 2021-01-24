<?php


namespace App\Http\Models\Video;

use App\User;
use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VideoComments
 * @package App\Http\Models\Video
 * @property int $id
 * @property int $file_id
 * @property int $user_id
 * @property String $comment
 * @property int $visible
 * @property String $created_at
 * @property String $updated_at
 */
class VideoComments extends Model
{
    protected $table = 'video_comments';

    public $items_per_page = 6;

    /**
     * @param null $file_id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|null
     */
    public function getItems($file_id = null){
        if(is_null($file_id))
            return null;

        $items = parent::query()->with(['relationUsers']);
        $items = $items
            ->where('file_id', '=', $file_id)
            ->where('visible', '=', 1)
            ->paginate($this->items_per_page);

        return $items;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insertItem($data = []){
        try{
            $this->user_id = $data['user_id'];
            $this->file_id = $data['file_id'];
            $this->comment = $data['comment'];
            $this->visible = 0;
            $this->save();

            return true;
        }catch (Exception $exception){
            return false;
        }
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateItem($data = []){
        try{
            $this->visible = $data['visible'];
            $this->save();

            return true;
        }catch (Exception $exception){
            return false;
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationUsers(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
