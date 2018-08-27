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
                @include('layouts.userheader')
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">他的文章</h2>
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
