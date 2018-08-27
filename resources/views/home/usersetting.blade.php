@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                {{$pageName}}
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="card" method="post" action="{{action("HomeController@userSettingAction")}}">
                    {{csrf_field()}}
                    <div class="card-body">
                        <h3 class="card-title">{{$pageName}}</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">邮箱</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Email"
                                           value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">用户名</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Username" value="{{!empty(old('name'))?old('name'):$user->name}}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">手机</label>
                                    <input type="text" class="form-control" disabled="" name="phone"
                                           placeholder="Phone" value="{{!empty(old('phone'))?old('phone'):$user->phone}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">密码</label>
                                    <input type="text" class="form-control" name="password"
                                           placeholder="不修改则留空">
                                </div>
                            </div>
                        </div>
                        @include('layouts.errors')
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">更新信息</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
