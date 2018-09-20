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
            @if(!empty($plate))
                <div class="col-lg-6">
                    <div class="card card-aside">
                        <div class="card-body d-flex flex-column">
                            <h4><a href="{{route('index')}}">全部文章.</a></h4>
                            <div class="text-muted">全部文章的归属地，这里存放{{config('app.name','LTC')}}的全部宝贝
                            </div>
                            <div class="d-flex align-items-center pt-5 mt-auto">
                                <div>
                                    <a href="{{route('index')}}" class="text-default">查看更多</a>
                                    <small class="d-block text-muted">{{config('app.name','LTC')}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($plate as $item)
                    <div class="col-lg-6">
                        <div class="card card-aside">
                            <div class="card-body d-flex flex-column">
                                <h4><a href="{{route('platePostsPage',['id'=>$item->id])}}">{{$item->title}}</a></h4>
                                <div class="text-muted">{{$item->subtitle}}
                                </div>
                                <div class="d-flex align-items-center pt-5 mt-auto">
                                    <div>
                                        <a href="{{route('platePostsPage',['id'=>$item->id])}}" class="text-default">查看更多</a>
                                        <small class="d-block text-muted">{{$item->created_at->format('M d , Y')}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <script>
                    swal({
                        title: '板块不存在',
                        text:'这里还没有任何板块，赶紧来创建一些板块吧',
                        type:'error',
                        heightAuto: false,
                        timer: 2000
                    })
                </script>
            @endif
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
