@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                {{$pageName}}
            </h1>
        </div>
        <form action="{{action('PostsController@addPostsAction')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">享受写文章的乐趣吧！</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">标题</label>
                                        <input type="text" name="title" class="form-control" placeholder="不要做个标题党哟"
                                               required
                                               value="{{old('title')}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">副标题</label>
                                        <textarea rows="2" class="form-control" name="subtitle"
                                                  placeholder="一个好的副标题很重要！"
                                                  required>{{old('subtitle')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">内容</label>
                                        <textarea rows="10" class="form-control" name="content"
                                                  placeholder="支持Markdown语法"
                                                  required>{{old('content')}}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @include('layouts.errors')
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">发布</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">更多信息</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">板块</label>
                                        <select class="form-control custom-select" name="plate">
                                            <option value="0">全部文章</option>
                                            @if(!empty($plate))
                                                @foreach($plate as $item)
                                                    <option
                                                            {{--提交错误后自动选中上次选中的--}}
                                                            @if(!empty(old('plate')))
                                                            @if(intval(old('plate')) == $item->id)
                                                            {{ "selected=\"selected\""}}
                                                            @endif
                                                            @endif
                                                            value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>
    </div>
@endsection
