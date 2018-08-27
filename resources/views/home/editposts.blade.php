@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                {{$pageName}}
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <form class="card" action="{{action('PostsController@editPostsAction')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="posts_id" value="{{$posts->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">标题</label>
                                    <input type="text" name="title" class="form-control" placeholder="不要做个标题党哟" required
                                           value="{{!empty(old('title'))?old('title'):$posts->title}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">副标题</label>
                                    <textarea rows="2" class="form-control" name="subtitle" placeholder="一个好的副标题很重要！"
                                              required>{{!empty(old('subtitle'))?old('subtitle'):$posts->subtitle}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">内容</label>
                                    <textarea rows="10" class="form-control" name="content" placeholder="支持Markdown语法"
                                              required>{{!empty(old('content'))?old('content'):$posts->content}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="example">
                            <div class="alert alert-icon alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">发布</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
