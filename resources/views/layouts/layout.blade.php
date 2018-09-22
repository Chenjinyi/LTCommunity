<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en"/>
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico"/>
    <title>{{config('app.name','LTCommunity')}}
        | {{$pageName}}{{!empty($titleString) ? "-".$titleString : null}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    {{--<link href="{{asset("/css/sweetalert2.min.css")}}" rel="stylesheet"/>--}}
    <script src="{{asset("/js/sweetalert2.all.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset('/css/animate.css')}}">
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    {{--tingle--}}
    {{--<link href="{{asset("tingle/tingle.min.css")}}" rel="stylesheet"/>--}}
    {{--<script src="{{asset("tingle/tingle.min.js")}}"></script>--}}
    <script src="{{asset("assets/js/require.min.js")}}"></script>
    <script>
        requirejs.config({
            baseUrl: ''
        });
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield("header")
    {{--<!-- Dashboard Core -->--}}
    <link href="{{asset("assets/css/dashboard.css")}}" rel="stylesheet"/>
    <script src="{{asset("assets/js/dashboard.js")}}"></script>
    {{--<!-- c3.js Charts Plugin -->--}}
    <link href="{{asset("assets/plugins/charts-c3/plugin.css")}}" rel="stylesheet"/>
    <script src="{{asset("assets/plugins/charts-c3/plugin.js")}}"></script>
    {{--<!-- Google Maps Plugin -->--}}
    <link href="{{asset("assets/plugins/maps-google/plugin.css")}}" rel="stylesheet"/>
    <script src="{{asset("assets/plugins/maps-google/plugin.js")}}"></script>
    {{--<!-- Input Mask Plugin -->--}}
    <script src="{{asset("assets/plugins/input-mask/plugin.js")}}"></script>

</head>
<body class="">
<div class="page">
    <div class="page-main">
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">
                    <a class="header-brand" href="{{url('/')}}">
                        <img src="{{asset("img/logo.svg")}}" class="header-brand-img" alt="{{config('app.name')}}">
                        {{--<p class="header-brand-img">Logo</p>--}}
                    </a>
                    <div class="d-flex order-lg-2 ml-auto">
                        @guest
                            <div class="nav-item d-none d-md-flex">
                                <a href="{{route('login')}}" class="btn btn-sm btn btn-primary">登陆</a>

                                <a href="{{route('register')}}" class="ml-2 btn btn-sm btn-outline-primary">注册</a>
                            </div>
                        @else
                            <div class="dropdown d-none d-md-flex">
                                @if(!empty(Auth::user()->msg))
                                    <a class="nav-link icon" data-toggle="dropdown">
                                        <i class="fe fe-bell"></i>
                                        <span class="nav-unread"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        @foreach(Auth::user()->msg as $msg)
                                            <a href="#" class="dropdown-item d-flex">
                                        <span class="avatar mr-3 align-self-center"
                                              style="background-image: url({{!empty($msg->user->author)?$msg->user->author:Gravatar::get($msg->user->email)}})"></span>
                                                <div>
                                                    {{$msg->title}}
                                                    <div class="small text-muted">{{$msg->created_at->format('M d , Y')}}</div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                            </div>
                        @endif
                        <div class="dropdown">
                            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                    <span class="avatar"
                                          style="background-image: url({{!empty(Auth::user()->author) ? Auth::user()->author : Gravatar::get(Auth::user()->email)}})"></span>
                                <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{Auth::user()->name}}</span>
                      <small class="text-muted d-block mt-1">{{Auth::user()->email}}</small>
                    </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{action('HomeController@userSettingPage')}}">
                                    <i class="dropdown-icon fe fe-user"></i> 用户设置
                                </a>
                                {{--<a class="dropdown-item" href="#">--}}
                                {{--<i class="dropdown-icon fe fe-settings"></i> Settings--}}
                                {{--</a>--}}
                                <a class="dropdown-item" href="{{action('MsgController@userMsgPage')}}">
                                    {{--<span class="float-right"><span--}}
                                                {{--class="badge badge-primary">{{empty(Auth::user()->msg->sum) ? 2 : 3}}</span></span>--}}
                                    <i class="dropdown-icon fe fe-mail"></i> 消息
                                </a>
                                {{--GSSS预定--}}
                                {{--<a class="dropdown-item" href="#">--}}
                                {{--<i class="dropdown-icon fe fe-send"></i> 投递--}}
                                {{--</a>--}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="https://github.com/Chenjinyi/LTCommunity/issues">
                                    <i class="dropdown-icon fe fe-help-circle"></i> 遇到BUG？
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="dropdown-icon fe fe-log-out"></i> 登出
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>
                    <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
                       data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <div class="container">
                <div class="row align-items-center">
                    {{--搜索功能--}}
                    {{--<div class="col-lg-3 ml-auto">--}}
                    {{--<form class="input-icon my-3 my-lg-0">--}}
                    {{--<input type="search" class="form-control header-search" placeholder="Search&hellip;"--}}
                    {{--tabindex="1">--}}
                    {{--<div class="input-icon-addon">--}}
                    {{--<i class="fe fe-search"></i>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                            <li class="nav-item">
                                <a href="{{route("index")}}" class="nav-link"><i class="fe fe-home"></i>首页</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i
                                            class="fe fe-box"></i>探索</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <p href="" onclick="devOnclick()" class="dropdown-item ">标签</p>
                                    {{--<a href="./" class="dropdown-item "></a>--}}
                                    {{--<a href="./" class="dropdown-item ">合作商</a>--}}
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{route('plateShowPage')}}" class="nav-link"><i class="fe fe-layers"></i>板块</a>
                            </li>
                            @auth
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i
                                                class="fe fe-file"></i>文章</a>
                                    <div class="dropdown-menu dropdown-menu-arrow">
                                        <a href="{{action('PostsController@showPostsPage')}}" class="dropdown-item ">文章列表</a>
                                        <a href="{{action('PostsController@addPostsPage')}}"
                                           class="dropdown-item ">编写文章</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i
                                                class="fe fe-user"></i>设置</a>
                                    <div class="dropdown-menu dropdown-menu-arrow">
                                        <a href="{{action('HomeController@userSettingPage')}}" class="dropdown-item ">用户设置</a>
                                        {{--<a href="" class="dropdown-item ">收款设置</a>--}}
                                    </div>
                                </li>
                                <li class="nav-item">
                                <a href="{{action('MsgController@userMsgPage')}}" class="nav-link"><i class="fe fe-bell"></i>消息</a>
                                </li>
                            @endauth
                            <script>
                                function devOnclick() {
                                    swal({
                                        title: '开发中',
                                        text: '该功能还在开发中哟',
                                        type: 'error',
                                        heightAuto: false,
                                        timer: 2000,
                                    })
                                }
                            </script>
                            {{--<li class="nav-item dropdown">--}}
                            {{--<a href="" class="nav-link"><i class="fe fe-check-square"></i> 时间线</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                            {{--<a href="./gallery.html" onclick="alert('开发中') class="nav-link"><i class="fe fe-image"></i>美图</a>--}}
                            {{--</li>--}}
                            {{--Misaka Wiki 预定--}}
                            {{--<li class="nav-item">--}}
                            {{--<a href="./docs/index.html" class="nav-link"><i class="fe fe-file-text"></i>--}}
                            {{--文档</a>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3 my-md-5">
            @yield('content')
        </div>
    </div>
    {{--底部拦 后期再使用--}}
    {{--<div class="footer">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-8">--}}
    {{--<div class="row">--}}
    {{--<div class="col-6 col-md-3">--}}
    {{--<ul class="list-unstyled mb-0">--}}
    {{--<li><a href="#">First link</a></li>--}}
    {{--<li><a href="#">Second link</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="col-6 col-md-3">--}}
    {{--<ul class="list-unstyled mb-0">--}}
    {{--<li><a href="#">Third link</a></li>--}}
    {{--<li><a href="#">Fourth link</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="col-6 col-md-3">--}}
    {{--<ul class="list-unstyled mb-0">--}}
    {{--<li><a href="#">Fifth link</a></li>--}}
    {{--<li><a href="#">Sixth link</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="col-6 col-md-3">--}}
    {{--<ul class="list-unstyled mb-0">--}}
    {{--<li><a href="#">Other link</a></li>--}}
    {{--<li><a href="#">Last link</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-lg-4 mt-4 mt-lg-0">--}}
    {{--Premium and Open Source dashboard template with responsive and high quality UI. For Free!--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-auto ml-lg-auto">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item"><a href="https://github.com/Chenjinyi/LTCommunity">Powered
                                        with ❤ by LTCommunity</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                    Copyright © 2018 <a
                            href="{{config('app.url','https://mercy.ink/')}}"> {{config('app.name','Franary')}} </a>.
                    Theme by <a href="https://codecalm.net" target="_blank">codecalm.net</a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>