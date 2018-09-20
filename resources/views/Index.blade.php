@extends('layouts.layout')

@section('header')



@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                {{$pageName}}
            </h1>
        </div>
        <div class="row row-cards">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">置顶文章</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th colspan="2">用户</th>
                                <th>标题</th>
                                <th>日期</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($topPosts))
                                @foreach($topPosts as $oPosts)
                                    <tr>
                                        <td class="w-1"><span class="avatar"
                                                              style="background-image: url({{!empty($oPosts->user->author) ? $oPosts->user->author : Gravatar::get($oPosts->user->email)}})"></span>
                                        </td>
                                        <td>
                                            <a href="{{route('userPage',['user_id'=>$oPosts->user->id])}}">{{$oPosts->user->name}}</a>
                                        </td>
                                        <td>
                                            <a href="{{route('postsPage',['posts_id'=>$oPosts->id])}}">{{$oPosts->title}}</a>
                                        </td>
                                        <td class="text-nowrap">{{$oPosts->created_at->format('M d , Y')}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">文章列表</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th colspan="2">用户</th>
                                <th>标题</th>
                                <th>日期</th>
                            </tr>

                            </thead>
                            <tbody>
                            @if(!empty($posts))
                                @foreach($posts as $aPosts)
                                    <tr>
                                        <td class="w-1"><span class="avatar"
                                                              style="background-image: url({{!empty($aPosts->user->author) ? $aPosts->user->author : Gravatar::get($aPosts->user->email)}})"></span>
                                        </td>
                                        <td>
                                            <a href="{{route('userPage',['user_id'=>$aPosts->user->id])}}">{{$aPosts->user->name}}</a>
                                        </td>
                                        <td>
                                            <a href="{{route('postsPage',['posts_id'=>$aPosts->id])}}">{{$aPosts->title}}</a>
                                        </td>
                                        <td class="text-nowrap">{{$aPosts->created_at->format('M d , Y')}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="mt-5 ml-5">{{$posts->links()}}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card card-aside">
                    <div class="card-aside-column" style="background-image: url(https://sz.ali.ftc.red/ftc/2018/08/27/image.png)"></div>
                    <div class="card-body">
                        <h4 class="card-title">纯真的信赖之心，果然是罪恶的源泉。</h4>
                        <p>
                            ——太宰治 《人间失格》
                        </p>
                    </div>
                </div>
                @guest
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title">注册/登陆账户，姬情畅聊。</h4>
                            <p class="card-text"></p>
                            <a href="{{route('login')}}" class="btn btn-primary">登陆</a>
                            <a href="{{route('register')}}" class="btn btn-outline-primary">注册</a>
                        </div>
                    </div>
                @endguest
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">发现用户</h3>
                    </div>
                    <div class="card-body o-auto" style="height: 15rem">
                        <ul class="list-unstyled list-separated">
                            @if(!empty($user))
                                @foreach($user as $arr)
                                    <li class="list-separated-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                        <span class="avatar avatar-md d-block"
                                              style="background-image: url({{!empty($arr->author) ? $arr->author : Gravatar::get($arr->email)}})"></span>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <a href="{{route('userPage',['user_id'=>$arr->id])}}"
                                                       class="text-inherit">{{$arr->name}}</a>
                                                </div>
                                                <small class="d-block item-except text-sm text-muted h-1x">
                                                    {{$arr->email}}
                                                </small>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <img class="card-img-top" src="https://sz.ali.ftc.red/ftc/2018/08/17/pixabay-1587673.md.jpg"
                         alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">友情链接</h4>
                    </div>
                    <ul class="list-group card-list-group">
                        {{--<li class="list-group-item">Cras justo odio</li>--}}
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <style>
        a {
            text-decoration: none;
            color: #495057;
        }

        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        a:active {
            text-decoration: none;
        }
    </style>

@endsection
