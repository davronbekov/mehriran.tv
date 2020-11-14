<?php


namespace App\Http\Models\Video;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

/**
 * Class VideoFiles
 * @package App\Http\Models\Video
 * @property int $id
 * @property String $type
 * @property int $snapshot_id
 * @property String $language
 * @property String $path
 * @property String $filename
 * @property String $ext
 * @property String $created_at
 * @property String $updated_at
 */
class VideoFiles extends Model
{
    protected $table = 'video_files';

    public function getFilteredItems($data = [], $type = 'video', $language = 'en'){
        $items = parent::query();

        $items ->join('video_params', 'video_params.file_id', '=', 'video_files.id')
            ->where('video_files.language', '=', $language);

        if(isset($data['word']))
            $items = $items->where('video_params.title', 'like', '%'.$data['word'].'%');

        $items = $items->where('video_files.type', '=', $type);

        return
            $items->select([
                'video_files.*'
            ])->get();
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
     * @param string $type
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getItems($type = 'video', $perPage = 18){
        return parent::query()
            ->where('type', '=', $type)
            ->paginate($perPage);
    }

    /**
     * @param string $type
     * @param int $perPage
     * @param string $language
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getItemsByLanguage($type = 'video', $perPage = 18, $language = 'en'){
        return parent::query()->with(['relationSnapshot', 'relationParams'])
            ->where('type', '=', $type)
            ->where('language', '=', $language)
            ->paginate($perPage);
    }

    public function getFileUrl(){
        return url('/'.$this->path.'/'.$this->filename.'.'.$this->ext);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insertItem($data = []){
        $this->type = $data['type'];
        $this->snapshot_id = $data['snapshot_id'];
        $this->language = $data['language'];
        $this->path = $data['path'];
        $this->filename = $data['filename'];
        $this->ext = $data['ext'];
        return $this->save();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateItem($data = []){
        $this->type = $data['type'];

        if(isset($data['snapshot_id']))
            $this->snapshot_id = $data['snapshot_id'];

        $this->language = $data['language'];
        $this->path = $data['path'];
        $this->filename = $data['filename'];
        $this->ext = $data['ext'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationSnapshot(){
        return $this->belongsTo(VideoSnapshots::class, 'snapshot_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationParams(){
        return $this->belongsTo(VideoParams::class, 'id', 'file_id');
    }

}
