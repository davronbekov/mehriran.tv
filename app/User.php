<?php

namespace App;

use App\Http\Models\Users\UserVideos;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkVideos($file_id = null){
        if(is_null($file_id))
            return false;

        $status = false;
        $time = time();

        /**
         * @var UserVideos $userVideos
         */
        $userVideos = app(UserVideos::class);
        $userVideos = $userVideos->getItems($file_id);
        foreach ($userVideos as $userVideo) {
            switch ($userVideo->type){
                case 'buy':
                    $status = true;
                    break;
                case 'rent':
                    if($time < $userVideo->expire_time){
                        $status = true;
                    }
                    break;
            }
        }

        return $status;
    }
}
