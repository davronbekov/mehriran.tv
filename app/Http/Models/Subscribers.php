<?php


namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscribers
 * @package App\Http\Models
 * @property String $email
 */
class Subscribers extends Model
{
    protected $table = 'subscribers';

    /**
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getItems($perPage = 18){
        return parent::query()
            ->paginate($perPage);
    }

    /**
     * @param null $email
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function getItem($email = null){
        if(is_null($email))
            return null;

        return parent::query()
            ->where('email', '=', $email)
            ->first();
    }

    /**
     * @param null $email
     * @return bool|null
     */
    public function insertItem($email = null){
        if(is_null($email))
            return null;

        $this->email = $email;
        return $this->save();
    }
}
