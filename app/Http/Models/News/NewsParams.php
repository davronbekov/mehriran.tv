<?php


namespace App\Http\Models\News;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

/**
 * Class NewsParams
 * @package App\Http\Models\News
 * @property int $id
 * @property int $news_id
 * @property String $language
 * @property String $title
 * @property String $description
 * @property String $created_at
 * @property String $updated_at
 */
class NewsParams extends Model
{
    protected $table = 'news_params';

    /**
     * @param $news_id
     * @param $language
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function getItem($news_id, $language){
        $item = parent::query();

        $item = $item
            ->where('news_id', '=', $news_id)
            ->where('language', '=', $language)
            ->first();

        return $item;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insertOrUpdateItem($data = []){
        $this->news_id = $data['news_id'];
        $this->language = $data['language'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        return $this->save();
    }

    public function deleteItem(){
        try{
            $this->delete();

            Session::put('success', 'Success');
        }catch (Exception $exception){
            Session::put('error', $exception->getMessage());
        }
    }
}
