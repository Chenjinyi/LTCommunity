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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">板块文章</h3>
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
                        @if(!empty($posts_data))
                            @foreach($posts_data as $item)
                                @if($item->posts->status == 0)
                                    @continue
                                @endif
                                <tr>
                                    <td class="w-1"><span class="avatar"
                                                          style="background-image: url({{!empty($item->posts->user->author) ? $item->postsuser->author : Gravatar::get($item->posts->user->email)}})"></span>
                                    </td>
                                    <td>
                                        <a href="{{route('userPage',['user_id'=>$item->posts->user->id])}}">{{$item->posts->user->name}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('postsPage',['posts_id'=>$item->posts->id])}}">{{$item->posts->title}}</a>
                                    </td>
                                    <td class="text-nowrap">{{$item->posts->created_at->format('M d , Y')}}</td>
                                </tr>
                            @endforeach
                            @else
                            <script>
                                swal({
                                    title:'空空如野',
                                    text:'这里一篇文章都没有，赶紧来创建一些文章吧',
                                    type:'error',
                                    heightAuto: false,
                                    timer: 2000
                                })
                            </script>
                        @endif

                        </tbody>
                    </table>
                </div>
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
