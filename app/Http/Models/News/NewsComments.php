<?php


namespace App\Http\Models\News;

use Exception;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsComments
 * @package App\Http\Models\News
 * @property int $id
 * @property int $news_id
 * @property int $user_id
 * @property String $comment
 * @property int $visible
 * @property String $created_at
 * @property String $updated_at
 */
class NewsComments extends Model
{
    protected $table = 'news_comments';

    public $items_per_page = 6;

    /**
     * @param null $news_id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|null
     */
    public function getItems($news_id = null){
        if(is_null($news_id))
            return null;

        $items = parent::query()->with(['relationUsers']);
        $items = $items
            ->where('news_id', '=', $news_id)
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
            $this->news_id = $data['news_id'];
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
