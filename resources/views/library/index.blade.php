@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="text-center" style="margin-bottom: 5px; font-size: 23px; font-weight: normal">Best Sellers:</div>
    </div>

    <div class="row">
        @foreach ($bestsellers as $bestseller)
            <div class="col-md-4">

                <div class="box box-widget widget-user">
                    @if ($loop->first)
                        <div class="widget-user-header bg-green" style="background: url({{asset('assets/dist/img/smallbgcover1.png')}}) center center;">
                            <h4 class="text-center" style="font-size: 21px;"><a href="{{URL('/book/'.$bestseller->id)}}" style="color: inherit">{{ $bestseller->name }}</a></h4>
                            <h5 class="text-center widget-user-desc" style="margin-top: -7px">
                                @foreach ($bestseller->authors as $author)
                                    @if ($loop->last)
                                        <a href="{{URL('/author/'.$author->id)}}" style="color: inherit">{{ $author->name }}</a>
                                    @else
                                        <a href="{{URL('/author/'.$author->id)}}" style="color: inherit">{{ $author->name }}</a>,
                                    @endif
                                @endforeach
                            </h5>
                        </div>
                    @elseif($loop->last)
                        <div class="widget-user-header bg-red" style="background: url({{asset('assets/dist/img/smallbgcover3.png')}}) center center;">
                            <h4 class="text-center" style="font-size: 21px;"><a href="{{URL('/book/'.$bestseller->id)}}" style="color: inherit">{{ $bestseller->name }}</a></h4>
                            <h5 class="text-center widget-user-desc" style="margin-top: -7px">
                                @foreach ($bestseller->authors as $author)
                                    @if ($loop->last)
                                        <a href="{{URL('/author/'.$author->id)}}" style="color: inherit">{{ $author->name }}</a>
                                    @else
                                        <a href="{{URL('/author/'.$author->id)}}" style="color: inherit">{{ $author->name }}</a>,
                                    @endif
                                @endforeach
                            </h5>
                        </div>
                    @else
                        <div class="widget-user-header bg-yellow" style="background: url({{asset('assets/dist/img/smallbgcover2.png')}}) center center;">
                            <h4 class="text-center" style="font-size: 21px;"><a href="{{URL('/book/'.$bestseller->id)}}" style="color: inherit">{{ $bestseller->name }}</a></h4>
                            <h5 class="text-center widget-user-desc" style="margin-top: -7px">
                                @foreach ($bestseller->authors as $author)
                                    @if ($loop->last)
                                        <a href="{{URL('/author/'.$author->id)}}" style="color: inherit">{{ $author->name }}</a>
                                    @else
                                        <a href="{{URL('/author/'.$author->id)}}" style="color: inherit">{{ $author->name }}</a>,
                                    @endif
                                @endforeach
                            </h5>
                        </div>
                    @endif

                    <div class="widget-user-image">
                        @if(file_exists('covers/'.$bestseller->id.'s.jpg'))
                            <img class="img-circle" src="{{asset('covers/'.$bestseller->id.'s.jpg')}}" style="margin-top: 12px" alt="User Avatar">
                        @else
                            <img class="img-circle" src="{{asset('covers/0s.jpg')}}" style="margin-top: 12px" alt="User Avatar">
                        @endif
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                        <h5 style="font-size: 15px; margin-top: 17px" class="description-header">
                                            <a href="{{URL('/category/'.$bestseller->category->id)}}" style="color: inherit">{{ $bestseller->category->name }}</a>
                                        </h5>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.row -->

    @if ($books_count !== 0)
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Library</h3>

                <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <div style="margin-top: -22px">
                            {!! $books->links() !!}
                        </div>
                    </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th class="text-center" style="width: 10px">ID</th>
                        <th style="width: 400px">Name</th>
                        <th style="width: 255px">Author(s)</th>
                        <th style="width: 280px;">Category</th>
                        <th style="width: auto; text-align: center">Bestsellers Rank</th>
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
    @else
        <div class="row">
            <div class="text-center" style="margin-bottom: 5px; font-size: 20px; font-weight: normal">There are no results matching your search query. :/</div>
        </div>
    @endif
@stop