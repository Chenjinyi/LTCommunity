@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                {{$pageName}}
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <!-- Getting started -->
                {{--<div class="card card-profile">--}}
                    {{--<div class="card-header" style="background-image: url(https://sz.ali.ftc.red/ftc/2018/08/03/pixabay-2847042.md.jpg);"></div>--}}
                    {{--<div class="card-body text-center">--}}
                        {{--<img class="card-profile-img" src="{{!empty($posts->user->author) ? $posts->user->author : Gravatar::get($posts->user->email)}}">--}}
                        {{--<h3 class="mb-3">{{$posts->user->name}}</h3>--}}
                        {{--<p class="mb-4">--}}
                            {{--{{$posts->user->email}}--}}
                        {{--</p>--}}
                        {{--<button class="btn btn-outline-primary btn-sm">--}}
                            {{--<span class="fa fa-twitter"></span> 赞赏--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                        {{--<h4 class="card-title">数据</h4>--}}
                        {{--<p class="card-subtitle">阅读量：</p>--}}
                        {{--<p class="card-subtitle">发布于：{{$posts->created_at->format('M d , Y')}}</p>--}}
                        {{--<p class="card-subtitle">最后更新：{{$posts->updated_at->format('M d , Y')}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            {{--<div class="col-lg-8">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="text-wrap p-lg-6">--}}
                            {{--<h2 class="mt-0 mb-4">{{$posts->title}}</h2>--}}
                            {{--@if(!empty($posts->subtitle))--}}
                                {{--<p>{{$posts->subtitle}}</p>--}}
                            {{--@endif--}}
                            {{--@if(!empty($posts->tags))--}}
                                {{--<p>--}}
                                    {{--@foreach($posts->tags as $tag)--}}
                                        {{--<a href="{{route('tagsPage',['tag_id'=>$tag->id])}}"--}}
                                           {{--class="tag tag-rounded">{{$tag->title}}</a>--}}
                                    {{--@endforeach--}}
                                {{--</p>--}}
                            {{--@endif--}}
                            {{--<p>--}}
                                {{--{!! $posts->content !!}--}}
                            {{--</p>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    </div>
@endsection
