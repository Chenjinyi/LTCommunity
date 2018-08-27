<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
     * 获取该用户的设置
     */
    public function userSetting()
    {
        return $this->hasMany('App\UserSettingModel','user_id','id');
    }

    public function posts()
    {
        return $this->hasMany('App\PostsModel','user_id','id');
    }

    public function msg()
    {
        return $this->hasMany('App\MsgModel','user_id','id');
    }
}
