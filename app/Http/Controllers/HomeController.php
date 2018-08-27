<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function userSettingPage()
    {
        $user=Auth::user();
        $pageName="用户设置";
        return view('home.usersetting',compact('pageName','user'));
    }

    public function userSettingAction(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:6|max:64',
        ]);
        $user = User::find(Auth::id());

        if (!empty($request['password'])){
            $user->password=Hash::make($request['password']);
        }
        $request['name'] == $user->name ? :$user->name = $request['name'];
        $user->save();
        if (!empty($request['password'])){
            Auth::logout();
        }
        return redirect()->back();
    }
}
