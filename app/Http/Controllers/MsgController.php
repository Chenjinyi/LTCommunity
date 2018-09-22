<?php

namespace App\Http\Controllers;

use App\MsgModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsgController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userMsgPage()
    {
        $pageName="消息";
        $id = Auth::id();
        $msg = MsgModel::where('user_id',$id)->get();//获取信息
        if ($msg->isEmpty()){
            $msg=null;
        }
        return view('home.msgshow',compact('pageName','msg'));
    }
}
