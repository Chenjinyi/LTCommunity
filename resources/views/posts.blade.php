@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                {{$pageName}}
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-wrap p-lg-6">
                            <h2 class="mt-0 mb-4">{{$posts->title}}</h2>
                            @if(!empty($posts->subtitle))
                                <p>{{$posts->subtitle}}</p>
                            @endif
                            @if(!empty($posts->tags))
                                <p>
                                    @foreach($posts->tags as $tag)
                                        <a href="{{route('tagsPage',['tag_id'=>$tag->title])}}"
                                           class="tag tag-rounded">{{$tag->title}}</a>
                                    @endforeach
                                </p>
                            @endif
                            <p>
                                {!! $postsString !!}
                            </p>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <form action="{{action('CommentController@addCommentPostsAction')}}" method="post">
                        <div class="card-header">
                            <div class="input-group">
                                {{csrf_field()}}
                                <input type="text" name="content" class="form-control" required placeholder="写下你想评论的吧"
                                       value="{{old('content')}}">
                                <input type="hidden" name="posts_id" value="{{$posts->id}}">
                                <div class="input-group-append">
                                    <input type="submit" class="btn btn-primary" value="提交"/>
                                    {{--图片上传--}}
                                    {{--<button type="button" class="btn btn-secondary">--}}
                                    {{--<i class="fe fe-camera"></i>--}}
                                    {{--</button>--}}
                                </div>
                            </div>
                        </div>
                        @include('layouts.errors')
                    </form>
                    <ul class="list-group card-list-group">
                        @if(!$comment->isEmpty())
                            @foreach($comment as $str)
                                <li class="list-group-item py-5">
                                    <div class="media">
                                        <div class="media-object avatar avatar-md mr-4"
                                             style="background-image: url({{!empty($str->user->author) ? $str->user->author : Gravatar::get($str->user->email)}})"></div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <small class="float-right text-muted">{{$str->created_at->format('M d , Y')}}</small>
                                                <h5>
                                                    <a href="{{route("userPage",['user_id'=>$str->user->id])}}">{{$str->user->name}}</a>
                                                </h5>
                                            </div>
                                            <div>
                                                {{$str->content}}
                                            </div>
                                            {{--评论回复--}}
                                            {{--<ul class="media-list">--}}
                                            {{--<li class="media mt-4">--}}
                                            {{--<div class="media-object avatar mr-4" style="background-image: url(demo/faces/female/17.jpg)"></div>--}}
                                            {{--<div class="media-body">--}}
                                            {{--<strong>Debra Beck: </strong>--}}
                                            {{--Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus--}}
                                            {{--auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.--}}
                                            {{--</div>--}}
                                            {{--</li>--}}
                                            {{--</ul>--}}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="mt-5 ml-5">{{$comment->links()}}</div>
                </div>
            </div>
            <div class="col-lg-4">
                @include('layouts.userheader')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">数据</h4>
                        <p class="card-subtitle">阅读量：</p>
                        <p class="card-subtitle">发布于：{{$posts->created_at->format('M d , Y')}}</p>
                        <p class="card-subtitle">最后更新：{{$posts->updated_at->format('M d , Y')}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">他的文章</h2>
                    </div>
                    <table class="table card-table">
                        <tbody>
                        @if(!empty($userPosts))
                            @foreach($userPosts as $aPosts)
                                <tr>
                                    <td>
                                        <a href="{{route('postsPage',['posts_id'=>$aPosts->id])}}">{{$aPosts->title}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
