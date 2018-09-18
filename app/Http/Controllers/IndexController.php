<?php

namespace App\Http\Controllers;

use App\PostsDataModel;
use App\PostsModel;
use App\User;
use App\CommentModel;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * 返回首页页面
     */
    public function indexPage()
    {
        $topPosts = PostsModel::where('status', '=', 2)
            ->orWhere('status', '=', 3)
            ->get();

        $posts = PostsModel::orderBy('created_at', 'desc')
            ->where('status', '!=', 0)
            ->paginate(25);
        $pageName = "首页";

        if (User::all()->count() >= 5) { //防止获取不到用户报错
            $user = User::where('status', '!=', 0)->get()->random(5);
        } else {
            $user = null;
        }

        return view("Index", compact('pageName', 'posts', 'topPosts', 'user'));
    }

    /**
     * 返回探索页面
     */
    public function explorePage()
    {
        $pageName = "探索";
    }

    /**
     * 文章页面返回
     */
    public function postsPage($posts_id)
    {
        $errorNumBack = new ErrorNumBackController();
        $pageName = "文章";

        if (!empty($posts = PostsModel::where('id', $posts_id)->first())) {
            if ($posts->status == 0) {//当文章已经被删除则不显示
                return $errorNumBack->backPage('404');//错误返回
            }
            $comment =
                CommentModel::orderBy('created_at', 'desc')
                    ->where('posts_id', '=', $posts->id)
                    ->paginate(6);//获得评论

            $user = $posts->user;//获得作者信息

            !empty($userPosts =
                $user->posts()
                    ->where('status', '!=', 0)
                    ->get()
                    ->take(6))
                ?: $userPosts = null;//获得用户写的文章

            $posts_data = PostsDataModel::where('posts_id',$posts_id)->get();//获得文章额外数据
            if ($posts_data->isEmpty()){ //解决之前文章未生成
                $posts_data = PostsDataModel::create([
                    'list'=>'0',
                    'posts_id'=>$posts_id,
                    'plate_id'=>null,
                ]);
            }
            PostsDataModel::where('posts_id',$posts_id)->sharedLock()->increment('list');

            $titleString = $posts->title;
            $postsString = Markdown::convertToHtml($posts->content);
            return view('posts', compact('pageName', 'posts', 'titleString', 'postsString', 'userPosts', 'user', 'comment'));//文章返回
        }

        return $errorNumBack->backPage('404');//错误返回
    }


}
