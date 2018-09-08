@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                {{$pageName}}
            </h1>
            @include('layouts.errors')
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">文章</h2>
                    </div>
                    <table class="table card-table">
                        <tbody>
                        @if(!empty($userPosts))
                            @foreach($userPosts as $posts)
                                <tr>
                                    <td><a href="{{route('postsPage',['posts_id'=>$posts->id])}}">{{$posts->title}}</a>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-muted">{{$posts->created_at->format('M d , Y')}}</span>
                                    </td>
                                    <td class="w-1"><a class="icon"
                                                       href="{{ action('PostsController@delPostsAction') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('del-posts').submit();
                                                       ">
                                            <i class="fe fe-trash"></i></a></td>
                                    <form id="del-posts" action="{{ action("PostsController@delPostsAction") }}"
                                          method="POST"
                                          style="display: none;">
                                        <input type="hidden" value="{{$posts->id}}" name="posts_id">
                                        @csrf
                                    </form>
                                    <td class="w-1"><a
                                                href="{{action('PostsController@editPostsPage',['posts_id'=>$posts->id])}}"
                                                class="icon"><i class="fe fe-edit"></i></a></td>
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
