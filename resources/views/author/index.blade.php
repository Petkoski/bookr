@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-3">

                <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                @if(file_exists('authors-images/'.$author->id.'.jpg'))
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('authors-images/'.$author->id.'.jpg')}}" alt="User profile picture">
                @else
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('authors-images/0.jpg')}}" alt="User profile picture">
                @endif

                <h3 class="profile-username text-center">{{ $author->name }}</h3>

                <p class="text-muted text-center">{{ $author->description }}</p>

                <ul class="list-group list-group-unbordered" style="margin-top: 15px">
                    <li class="list-group-item">
                        <b>Followers</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        {{--<div class="box box-primary">--}}
            {{--<div class="box-header with-border">--}}
                {{--<h3 class="box-title">About Me</h3>--}}
            {{--</div>--}}
            {{--<!-- /.box-header -->--}}
            {{--<div class="box-body">--}}
                {{--<strong><i class="fa fa-book margin-r-5"></i> Education</strong>--}}

                {{--<p class="text-muted">--}}
                    {{--B.S. in Computer Science from the University of Tennessee at Knoxville--}}
                {{--</p>--}}

                {{--<hr>--}}

                {{--<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>--}}

                {{--<p class="text-muted">Malibu, California</p>--}}

                {{--<hr>--}}

                {{--<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>--}}

                {{--<p>--}}
                    {{--<span class="label label-danger">UI Design</span>--}}
                    {{--<span class="label label-success">Coding</span>--}}
                    {{--<span class="label label-info">Javascript</span>--}}
                    {{--<span class="label label-warning">PHP</span>--}}
                    {{--<span class="label label-primary">Node.js</span>--}}
                {{--</p>--}}

                {{--<hr>--}}

                {{--<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>--}}

                {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>--}}
            {{--</div>--}}
            {{--<!-- /.box-body -->--}}
        {{--</div>--}}
        <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div style="margin-top: 10px">
                <div class="row">
                    <div class="text-center" style="margin-bottom: 5px; font-size: 16px; font-weight: normal">Newest Releases</div>
                </div>
                @foreach($books as $book)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-default collapsed-box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        {{ $book->name }} <span style="font-size: 14px; margin-left: 10px">[{{ $book->format }}, {{ $book->publisher }}, {{ explode(" ", $book->publication_date)[2] }}]</span>
                                    </h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    {{ $book->description }}
                                </div>

                                <div class="box-footer">
                                    <a href="{{URL('/book/'.$book->id)}}">
                                        <button type="button" class="btn btn-primary btn-flat">Read More</button>
                                    </a>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                @endforeach
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>

@stop