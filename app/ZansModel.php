<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZansModel extends Model
{
    protected $table="zans";

    protected $fillable=[
        'user_id','posts_id'
    ];

    /**
     * 获得此赞所属的用户。
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * 获得此赞所属的文章
     */
    public function posts()
    {
        return $this->belongsTo('App\PostsModel');
    }
}