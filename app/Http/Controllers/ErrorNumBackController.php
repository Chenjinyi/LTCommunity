<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorNumBackController extends Controller
{
    protected $errorNumberString = [//返回值定义
        '404' => [
            'number' => '404',
            'name' => '找不到你要的页面了',
            'content' => '可能你要找的页面已经丢失了'
        ]
    ];

    protected $errorNumberStringDefault = [//找不到时的返回
        'number' => '出错啦',
        'name' => '出现了一个很奇怪的错误',
        'content' => '这可能是个大新闻(逃)'
    ];

    /**
     * 错误返回
     */
    public function backPage($errorNumber, $userArray=null)
    {
        if (empty($result = $this->errorNumberString[$errorNumber])) {
            $userArray ? $result = $userArray : $result = $this->errorNumberStringDefault;
        }
        $backError = $result;
        return view('errornumback', compact('backError'));
    }
}
