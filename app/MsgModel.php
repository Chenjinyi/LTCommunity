<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsgModel extends Model
{
    protected $table = "msg";

    protected $fillable = [
        'title', 'subtitle', 'content', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
