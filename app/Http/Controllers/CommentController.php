<?php

namespace App\Http\Controllers;

use App\CommentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()//登陆
    {
        $this->middleware('auth');
    }

    public function addCommentPostsAction(Request $request)
    {
        $this->validate($request, [
            'content' => 'min:3|max:200|string|required',
            'posts_id' => 'required|exists:posts,id'
        ]);
        $user_id = Auth::id();

        $comment= new CommentModel();
        $comment->content = $request['content'];
        $comment->posts_id = $request['posts_id'];
        $comment->user_id = $user_id;
        $comment->save();

//        return redirect()->back();
        $path=$request['posts_id']."#comment".$comment->id;
        return redirect(url('posts/'.$path));
    }
}
