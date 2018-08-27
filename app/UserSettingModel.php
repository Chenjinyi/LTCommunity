<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSettingModel extends Model
{
    protected $table = "user_setting";
    protected $fillable= [
        'name','value','user_id'
    ];
}
