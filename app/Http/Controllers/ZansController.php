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

    }
}
