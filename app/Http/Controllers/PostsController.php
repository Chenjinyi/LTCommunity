<?php

namespace App\Http\Controllers;

use App\CommentModel;
use App\PostsDataModel;
use App\PostsModel;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//登陆操作
    }

    /**
     * 添加文章页面
     */
    public function addPostsPage()
    {
        $pageName = "编写文章";
        return view('home.addposts', compact('pageName'));

    }

    /**
     * 添加文章操作
     */
    public function addPostsAction(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:60|min:5|string|unique:posts,title',
            'subtitle' => 'required|max:200|min:5|string',
            'content' => 'required|max:9999|min:10|string',
        ]);

        $user_id = Auth::id();
        $posts_id = PostsModel::create([
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'content' => $request['content'],
            'user_id' => $user_id
        ]);
        return redirect()->route('postsPage', ['posts_id' => $posts_id->id]);
    }

    /**
     * 删除文章
     */
    public function delPostsAction(Request $request)
    {
        $errorNumBack = new ErrorNumBackController();
        $this->validate($request,[
            'posts_id'=>'required|exists:posts,id'
        ]);//验证

        if (!Auth::id() == $request['posts_id']) {//权限认证
            return $errorNumBack->backPage('404');//错误返回
        }

        $posts = PostsModel::find($request['posts_id']);
        $posts->status= 0;
        $posts->save();
        return redirect()->back();

    }

    /**
     * 编辑文章页面
     */
    public function editPostsPage($posts_id)
    {
        $pageName = "编辑文章";
        $errorNumBack = new ErrorNumBackController();
        $user = Auth::user();

        if (!empty($posts = PostsModel::where('id', $posts_id)->first())) {

            if ($posts->status == 0) {//当文章已经被删除则不显示
                return $errorNumBack->backPage('404');//错误返回
            }

            if (Auth::id() == $posts->user_id) {//权限认证
                return view('home.editposts', compact('pageName', 'posts'));
            }
            return $errorNumBack->backPage('404');//错误返回
        }

        return $errorNumBack->backPage('404');//错误返回


    }

    /**
     * 编辑文章操作
     */
    public function editPostsAction(Request $request)
    {
        $errorNumBack = new ErrorNumBackController();
        $this->validate($request, [
            'title' => 'required|max:60|min:5|string|unique:posts,title',
            'subtitle' => 'required|max:200|min:5|string',
            'content' => 'required|max:9999|min:10|string',
            'posts_id' => 'required|exists:posts,id'
        ]);

        if (!Auth::id() == $request['posts_id']) {//权限认证
            return $errorNumBack->backPage('404');//错误返回
        }
        $posts = PostsModel::find($request['posts_id']);
        $posts->update([
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'content' => $request['content'],
        ]);
        return redirect()->route('postsPage', ['posts_id' => $posts->id]);
    }

    /**
     * 文章列表
     */
    public function showPostsPage()
    {
        $pageName = "文章列表";
        $user = Auth::user();

        $userPosts =
            PostsModel::orderBy('created_at', 'desc')
                ->where('user_id', '=', $user->id)
                ->where('status', '!=', 0)
                ->paginate(6);//获得文章
        !$userPosts->isEmpty() ?: $userPosts = null;
        return view('home.showposts', compact('pageName', 'userPosts'));
    }

    protected function postsData($posts_id)
    {

    }
}
