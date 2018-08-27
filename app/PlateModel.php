<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlateModel extends Model
{
    protected $table = "plate";

    protected $fillable=[
        'title','subtitle','content','status'
    ];

    public function postsData()
    {
        return $this->hasMany('App\PostsDataModel','plade_id','posts_id');
    }
}
