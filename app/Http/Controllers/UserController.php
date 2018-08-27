<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 用户页面返回
     */
    public function userPage($user_id)
    {
        $pageName = "用户";
        $errorNumBack = new ErrorNumBackController();

        if (!empty($user = User::where('id', $user_id)->first())) {
            $titleString = $user->name;
            !empty($userPosts = $user->posts()->where('status', '!=', 0)->get()) ?: $userPosts = null;//获得用户写的文章
            return view('user', compact('pageName', 'user', 'titleString', 'userPosts'));//用户返回
        }

        return $errorNumBack->backPage('404');//错误返回
    }
}
