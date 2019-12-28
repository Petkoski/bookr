@extends('layouts.master')

@section('content')
    {{--<div class="box box-default">--}}
        {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Blank Box</h3>--}}
        {{--</div>--}}
        {{--<div class="box-body">--}}
            {{--TEST!--}}
        {{--</div>--}}
        {{--<!-- /.box-body -->--}}
    {{--</div>--}}

    <div class="box">
        <div class="box-header">
            @foreach($books as $book)
                @if ($loop->first)
                    <h3 class="box-title" style="text-align: center">Category: <b>{{ $book->category->name }}</b></h3>
                    @break
                @endif
            @endforeach


            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <div style="margin-top: -22px">
                        {!! $books->links() !!}
                    </div>
                </ul>
            </div>

            {{--<div class="box-tools">--}}
                {{--<ul class="pagination pagination-sm no-margin pull-right">--}}
                    {{--<li><a href="#">&laquo;</a></li>--}}

                    {{--@for ($i = 1; $i <= floor($books_count / 15) + 1; $i++)--}}
                        {{--<li><a href="?page={{ $i }}">{{ $i }}</a></li>--}}
                    {{--@endfor--}}

                    {{--<li><a href="#">&raquo;</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="text-center" style="width: 10px">ID</th>
                    <th style="width: 400px">Name</th>
                    <th style="width: 255px">Author(s)</th>
                    <th style="width: 280px">Category</th>
                    <th style="width: auto; text-align: center">Bestsellers Rank</th>
                    {{--<th>Progress</th>--}}
                    {{--<th style="width: 240px">Name</th>--}}
                </tr>

                @foreach($books as $book)
                    <tr>
                        <td class="text-center">{{ $book->id }}</td>

                        <td><a href="{{URL('/book/'.$book->id)}}" style="color: #333; ">{{ $book->name }}</a></td>

                        <td>
                            @foreach ($book->authors as $author)
                                @if ($loop->last)
                                    <a href="{{URL('/author/'.$author->id)}}" style="color: #333; ">{{ $author->name }}</a>
                                @else
                                    <a href="{{URL('/author/'.$author->id)}}" style="color: #333; ">{{ $author->name }}</a>,
                                @endif
                            @endforeach
                        </td>
                        <td><a href="{{URL('/category/'.$book->category_id)}}" style="color: #333; ">{{ $book->category->name }}</a></td>
                        <td style="text-align: center">{{ $book->bestsellers_rank }}</td>
                    </tr>
                @endforeach

            </table>
        </div>
        <!-- /.box-body -->
    </div>
@stop