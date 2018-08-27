<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 'comment';

    protected $fillable = [
        'comment', 'user_id', 'posts_id', 'status'
    ];

    /**
     * 获得此评论所属的文章。
     */
    public function post()
    {
        return $this->belongsTo('App\PostsModel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
