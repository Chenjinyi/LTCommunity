<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    protected $table = "posts";

    protected $fillable=[
        'title','subtitle','content','user_id'
    ];

    /**
     * 获得此文章的作者。
     */
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    /**
     * 获取文章的更多数据
     */
    public function postsData()
    {
        return $this->hasOne('App\PostsDataModel')->withDefault();
    }

    /**
     * 获得该文章评论
     */
    public function comment()
    {
        return $this->hasMany('App\CommentModel','posts_id','id');
    }

    /**
     * 获得该文章的赞
     */
    public function zans()
    {
        return $this->hasMany('App\ZansModel');
    }

    public function tags()
    {
        return $this->hasMany('App\TagsModel','posts_id','id');
    }
}
