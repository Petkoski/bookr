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

    @if (session('status'))
        <div class="row">
            <div class="alert alert-info alert-dismissible col-sm-6 col-sm-offset-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                The book was just added to your <a href="{{URL('/cart')}}">cart.</a>
            </div>
        </div>
    @endif

    @foreach($book as $b)
        @if ($loop->first)
            <div class="box">
                <div class="box-header text-center" style="margin-top: -5px; margin-bottom: 5px;">
                    <h3 class="">{{ $b->name }}</h3>
                    <h5 class="text-center" style="font-family: 'Droid Sans', sans-serif;">
                        Author(s):
                        <b>
                            @foreach ($b->authors as $author)
                                @if ($loop->last)
                                    <a href="{{URL('/author/'.$author->id)}}">{{ $author->name }}</a>
                                @else
                                    <a href="{{URL('/author/'.$author->id)}}">{{ $author->name }}</a>,
                                @endif
                            @endforeach
                        </b>
                    </h5>
                    <h5 class="text-center" style="font-family: 'Droid Sans', sans-serif;">Category: <a href="{{URL('/category/'.$b->category->id)}}"><b>{{ $b->category->name }}</b></a></h5>
                </div>

                <div class="row">

                    <div class="col col-md-4" style="margin-left: 47px">
                        <div class="box box-solid">
                            <div class="box-header with-border text-center">
                                <i class="fa fa-image"></i>
                                <h3 class="box-title">Cover</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    </ol>

                                    @if(file_exists('covers/'.$b->id.'.png'))
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="{{asset('covers/'.$b->id.'.png')}}" alt="First slide">

                                                <div class="carousel-caption">Front</div>
                                            </div>
                                            <div class="item">
                                                <img src="{{asset('covers/'.$b->id.'.png')}}" alt="Second slide">
                                                <div class="carousel-caption">Back</div>
                                            </div>
                                            {{--<div class="item">--}}
                                            {{--<img src="{{asset('covers/'.$b->id.'.png')}}" alt="Third slide">--}}

                                            {{--<div class="carousel-caption">--}}
                                            {{--Third Slide--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                        </div>
                                    @else
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="{{asset('covers/0.png')}}" alt="First slide">
                                                <div class="carousel-caption">Front</div>
                                            </div>
                                            <div class="item">
                                                <img src="{{asset('covers/0.png')}}" alt="Second slide">
                                                <div class="carousel-caption">Back</div>
                                            </div>
                                        </div>
                                    @endif

                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                        <span class="fa fa-angle-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                        <span class="fa fa-angle-right"></span>
                                    </a>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>


                    <div class="col col-sm-7">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <i class="fa fa-tasks"></i>

                                <h3 class="box-title">Product Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <dl class="dl-horizontal">
                                    <dt>Format</dt>
                                    <dd>{{ $b->format }}</dd>

                                    <dt>Dimensions</dt>
                                    <dd>{{ $b->dimensions }}</dd>

                                    <dt>Publication Date</dt>
                                    <dd>{{ $b->publication_date }}</dd>

                                    <dt>Publisher</dt>
                                    <dd>{{ $b->publisher }}</dd>

                                    <dt>Publication City/Country</dt>
                                    <dd>{{ $b->publication_city }}</dd>

                                    <dt>Language</dt>
                                    <dd>{{ $b->language }}</dd>

                                    <dt>ISBN10</dt>
                                    <dd>{{ $b->isbn10 }}</dd>

                                    <dt>ISBN13</dt>
                                    <dd>{{ $b->isbn13 }}</dd>

                                    <dt>Bestsellers Rank</dt>
                                    <dd>{{ $b->bestsellers_rank }}</dd>
                                </dl>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>


                    <div class="col-sm-7">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <i class="fa fa-quote-left"></i>

                                <h3 class="box-title">Description</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <dl class="dl-horizontal">
                                    {{ $b->description }}
                                </dl>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                    <div class="col col-md-4" style="margin-left: 47px">
                    </div>

                    <div class="col col-sm-7">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <i class="fa fa-dot-circle-o"></i>

                                <h3 class="box-title">Price: <span style="color: #ac2925">{{ $b->price }} €</span></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form role="form" method="GET" action="{{URL('/cart/AddToCart')}}">
                                    <div class="row">
                                        <input type="hidden" name="book_id" value="{{$b->id}}">

                                        <div class="col-xs-3">
                                            <label style="margin-top: 7px">Quantity:</label>
                                        </div>

                                        <div class="col-xs-2">
                                            <input type="text" name="quantity" class="form-control" placeholder="Quantity" style="margin-left: -95px">
                                        </div>

                                        <div class="col-xs-3">
                                            <button class="btn btn-primary btn-flat" type="submit" style=" margin-left: -115px">ADD TO CART</button>
                                        </div>
                                    </div>
                                    {{--<div class="row col-xs-3">--}}
                                        {{--<dl class="dl-horizontal">--}}
                                            {{--<button class="btn btn-primary btn-flat" type="submit">ADD TO CART</button>--}}
                                        {{--</dl>--}}
                                    {{--</div>--}}
                                </form>

                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>


                <!-- /.box-body -->
            </div>

        @endif
    @endforeach
@stop