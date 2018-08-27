<?php

namespace App\Http\Controllers;

use App\TagsModel;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * tags页面返回
     */
    public function tagsPage($tagName)
    {
        $errorNumBack = new ErrorNumBackController();
        $pageName = "标签";

        $tags = TagsModel::where([ //获取标签数据
            ['status', '!=', '0'],
            ['title', '=', $tagName]
        ])->get();

        if(!$tags->isEmpty()){
            $titleString = $tagName;
            return view('tags', compact('titleString', 'pageName', 'tags'));
        };

        return $errorNumBack->backPage('404');//错误返回
    }

    public function tagsExplorePage()
    {
        TagsModel::orderBy('created_at', 'desc');
    }
}
