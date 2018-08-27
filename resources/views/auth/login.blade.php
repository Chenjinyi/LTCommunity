<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>{{config('app.name','GMCoffee')}} 用户登陆 Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{asset("assets/js/require.min.js")}}"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script>
{{--后期可能更改为手机号以及第三方--}}
<!-- Dashboard Core -->
    <link href="{{asset("assets/css/dashboard.css")}}" rel="stylesheet" />
    <script src="{{asset("assets/js/dashboard.js")}}"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{asset("assets/plugins/charts-c3/plugin.css")}}" rel="stylesheet" />
    <script src="{{asset("assets/plugins/charts-c3/plugin.js")}}"></script>
    <!-- Google Maps Plugin -->
    <link href="{{asset("assets/plugins/maps-google/plugin.css")}}" rel="stylesheet" />
    <script src="{{asset("assets/plugins/maps-google/plugin.js")}}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{asset("assets/plugins/input-mask/plugin.js")}}"></script>
</head>
<body class="">
<div class="page">
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <img src="{{asset("/demo/brand/tabler.svg")}}" class="h-6" alt="">
                    </div>
                    <form class="card" action="{{ route('login') }}" method="post">
                        {{csrf_field()}}
                        <div class="card-body p-6">
                            <div class="card-title">登陆你的账户</div>
                            <div class="form-group">
                                <label class="form-label">邮箱</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{old('email')}}" placeholder="Enter email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    密码
                                    <a href="./forgot-password.html" class="float-right small">忘记密码</a>
                                </label>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" name="password" placeholder="Password"">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" />
                                    <span class="custom-control-label">记住我</span>
                                </label>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block">登陆</button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-muted">
                        还没有账户? <a href="{{route('register')}}">注册</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>% 