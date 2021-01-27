<?php


namespace App\Http\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Playlist
 * @package App\Http\Models
 * @property int $id
 * @property String $path
 * @property String $filename
 * @property String $ext
 * @property int $duration
 * @property String $starts
 * @property String $created_at
 * @property String $updated_at
 */
class Playlist extends Model
{
    protected $table = 'playlist';

    public $items_per_page = 18;

    /**
     * @param null $id
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function getItem($id = null){
        if(is_null($id))
            return null;

        $item = parent::query();
        $item = $item
            ->where('id', '=', $id)
            ->first();

        return $item;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getItems(){
        $items = parent::query();

        $items = $items
            ->orderBy('id', 'asc')
            ->paginate($this->items_per_page);

        return $items;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insertItem($data = []){
        try{
            $this->path = $data['path'];
            $this->filename = $data['filename'];
            $this->ext = $data['ext'];

            $this->starts = $data['starts'];
            $this->duration = $data['duration'];
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
            $this->path = $data['path'];
            $this->filename = $data['filename'];
            $this->ext = $data['ext'];

            $this->starts = $data['starts'];
            $this->duration = $data['duration'];
            $this->save();

            return true;
        }catch (Exception $exception){
            return false;
        }
    }

    /**
     * @return bool
     */
    public function deleteItem(){
        try{
            $this->delete();
            return true;
        }catch (Exception $exception){
            return false;
        }
    }
}
