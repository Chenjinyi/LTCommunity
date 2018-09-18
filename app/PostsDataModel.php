<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsDataModel extends Model
{
    protected $table = 'posts_data';

    public $timestamps = false;

    protected $fillable=[
      'list','posts_id','plate_id'
    ];

    public function posts()
    {
        return $this->hasOne('App\PostsModel','id','posts_id')->withDefault();
    }
}
