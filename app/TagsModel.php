<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    protected $table='tags';

    public function user(){
        return $this->hasOne('App\User','user_id','id');
    }
}
