<?php


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscribers
 * @package App\Http\Models
 * @property String $name
 * @property String $phone
 * @property String $email
 * @property String $text
 * @property String $created_at
 * @property String $updated_at
 */
class Feedbacks extends Model
{
    protected $table = 'feedbacks';

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
    public function insertItem($data = []){
        $this->name = $data['name'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->text = $data['text'];
        return $this->save();
    }
}
