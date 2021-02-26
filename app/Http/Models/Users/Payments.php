<?php


namespace App\Http\Models\Users;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payments
 * @package App\Http\Models\Users
 * @property int $id
 * @property String $current_status
 * @property int $user_id
 * @property int $file_id
 * @property String $token
 * @property Double $amount
 * @property String $created_at
 * @property String $updated_at
 */
class Payments extends Model
{
    protected $table = 'user_payments';

    /**
     * @param null $token
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public function getItem($token = null){
        if(is_null($token))
            return null;

        $item = parent::query();
        $item = $item
            ->where('token', '=', $token)
            ->first();

        return $item;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insertItem($data = []){
        try{
            $this->current_status = $data['current_status'];
            $this->user_id = $data['user_id'];
            $this->file_id = $data['file_id'];
            $this->token = $data['token'];
            $this->amount = $data['amount'];
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
            $this->current_status = $data['current_status'];
            $this->save();
            return true;
        }catch (Exception $exception){
            return false;
        }
    }
}
