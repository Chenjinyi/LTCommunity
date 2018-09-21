<?php

namespace App\Http\Controllers;

use App\CommentModel;
use App\PlateModel;
use App\PostsDataModel;
use App\PostsModel;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


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
        $plate = $this->getPlate();
        return view('home.addposts', compact('pageName', 'plate'));

    }

    /**
     * 获取板块
     */
    protected function getPlate()
    {
        $plate = PlateModel::orderBy('created_at', 'desc')
            ->where('status', '!=', 0)
            ->get();
        if ($plate->isEmpty()) {
            $plate = null;
        }
        return $plate;
    }

    /**
     * 能添加的板块
     */
    protected function canOperatePlate()
    {
        $plate = $this->getPlate(); //获取存在的板块id
        $can_operate_plate = [];
        foreach ($plate as $itme) {
            array_push($can_operate_plate, $itme->id);
        }
        array_push($can_operate_plate, '0');
        return $can_operate_plate;
    }

    /**
     * 添加文章操作
     */
    public function addPostsAction(Request $request)
    {
        $can_operate_plate = $this->canOperatePlate();
        $this->validate($request, [
            'title' => 'required|max:60|min:5|string',
//            'title' => 'required|max:60|min:5|string|unique:posts,title',
            'subtitle' => 'required|max:200|min:5|string',
            'content' => 'required|max:9999|min:10|string',
            'plate' => [
                'required',
                Rule::in($can_operate_plate)
            ]
        ]);

        $user_id = Auth::id();
        $posts_id = PostsModel::create([
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'content' => $request['content'],
            'user_id' => $user_id
        ]);
        $posts_data = PostsDataModel::create([
            'list' => '0',
            'posts_id' => $posts_id->id,
            'plate_id' => $request['plate'],
        ]);
        return redirect()->route('postsPage', ['posts_id' => $posts_id->id]);
    }

    /**
     * 删除文章
     */
    public function delPostsAction(Request $request)
    {
        $errorNumBack = new ErrorNumBackController();
        $this->validate($request, [
            'posts_id' => 'required|exists:posts,id'
        ]);//验证

        if (!Auth::id() == $request['posts_id']) {//权限认证
            return $errorNumBack->backPage('404');//错误返回
        }

        $posts = PostsModel::find($request['posts_id']);
        $posts->status = 0;
        $posts->save();
        return redirect()->back()->with('delstatus', 'yes');

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
                $plate = $this->getPlate();
                return view('home.editposts', compact('pageName', 'posts', 'plate'));
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
        $can_operate_plate = $this->canOperatePlate();//板块获取
        $errorNumBack = new ErrorNumBackController();
        $this->validate($request, [
            'title' => 'required|max:60|min:5|string',
            'subtitle' => 'required|max:200|min:5|string',
            'content' => 'required|max:9999|min:10|string',
            'posts_id' => 'required|exists:posts,id',
            'plate' => [
                'required',
                Rule::in($can_operate_plate)
            ]
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

        PostsDataModel::where('posts_id',$request['posts_id'])->update(['plate_id'=>$request['plate']]);//板块更新
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
                ->get();
        !$userPosts->isEmpty() ?: $userPosts = null;
        return view('home.showposts', compact('pageName', 'userPosts'));
    }

    protected function postsData($posts_id)
    {

    }
}
