<?php

namespace App\Http\Controllers;

use App\ZansModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 文章点赞操作
     */
    public function postsZansAction(Request $request)
    {
//        $this->validate($request,[
//            'posts_id'=>'request|'
//        ]);

        $zans = new ZansModel();
        $zans->user_id  = Auth::id();
        $zans->posts_id = $posts_id;
        $zans->save();
        return redirect(back());
    }
}
