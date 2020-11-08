<?php


namespace App\Http\Models\News;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

/**
 * Class News
 * @package App\Http\Models\News
 * @property int $id
 * @property String $identify
 * @property String $created_at
 * @property String $updated_at
 *
 * @property NewsParams $relationParams
 */
class News extends Model
{
    protected $table = 'news';

    /**
     * @param int $perPage
     * @param string $language
     * @return mixed
     */
    public function getItemsList($perPage = 18, $language = 'en'){
        $items = parent::query();
        $items = $items
            ->join('news_params', 'news_params.news_id', '=', 'news.id')
            ->where('news_params.language', '=', $language)
            ->limit($perPage)
            ->select([
                'news_params.news_id as id',
                'news_params.title as title'
            ])
            ->get();
        return $items;
    }

    /**
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getItems($perPage = 18){
        return parent::query()
            ->paginate($perPage);
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
    public function insertOrUpdate($data = []){
        $this->identify = $data['identify'];
        return $this->save();
    }

    /**
     * @return bool
     */
    public function deleteItem(){
        try{
            $this->delete();
            Session::put('success', 'Item successfully deleted');

            return true;
        }catch (Exception $exception){
            Session::put('error', $exception->getMessage());
        }

        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relationParams(){
        return $this->hasMany(NewsParams::class, 'news_id', 'id');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}
