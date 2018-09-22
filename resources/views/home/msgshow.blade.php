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
                    <h3 class="card-title"> {{$pageName}}</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>副标题</th>
                            <th>日期</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($msg))
                            @foreach($msg as $item)
                                @if($item->status == 0)
                                    @continue
                                @endif
                                <tr onclick="msg('{{$item->title}}','{{$item->subtitle}}','{{$item->content}}')">
                                    <td>
                                        {{$item->title}}
                                    </td>
                                    <td>
                                        {{$item->subtitle}}
                                    </td>
                                    <td class="text-nowrap">{{$item->created_at->format('M d , Y')}}</td>
                                </tr>
                            @endforeach
                            @else
                            <script>
                                swal({
                                    title:'没有通知',
                                    text:'没有人通知你哟',
                                    type:'error',
                                    heightAuto: false,
                                    timer: 2000
                                })
                            </script>
                        @endif
                        <script>
                            function msg(title,subtitle,content) {
                                swal({
                                    title: title,
                                    animation: false,
                                    customClass: 'animated tada',
                                    heightAuto: false,
                                    confirmButtonText: '知道了',
                                    html:
                                        '<strong>'+subtitle+'</strong></br>'+
                                        content,
                                    }
                                )
                            }
                        </script>

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
