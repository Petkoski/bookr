@extends('layouts.master')

@section('topscripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('content')
    <div class="col-sm-6 col-sm-offset-3" style="margin-bottom: 2px;">
        <div class="text-center" style="margin-bottom: 5px; font-size: 23px; font-weight: normal">Authors:</div>
    </div>

    <div class="row" style="margin-bottom: 30px;">
        <div class="container col-sm-6 col-sm-offset-3">
            {{--action="{{URL('search')}}"--}}
            <form method="GET" class="search-form" role="search" action="{{URL('/authors/search')}}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" id="search" name="query">

                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row" id="searchData">
        @foreach($authors as $author)
            <div class="col-md-2" style="margin-bottom: 20px">
                @if(file_exists('authors-images/'.$author->id.'.jpg'))
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('authors-images/'.$author->id.'.jpg')}}" alt="User profile picture">
                @else
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('authors-images/0.jpg')}}" alt="User profile picture">
                @endif
                <a href="{{URL('/author/'.$author->id)}}">
                    <p class="" style="font-size: 12pt; text-align: center; color: #333333; font-family: 'Droid Sans', sans-serif;">{{ $author->name }}</p>
                </a>
            </div>
        @endforeach
    </div>

    <div class="row text-center" id="paginationLinks">
        {!! $authors->links() !!}
    </div>

    <!-- /.content -->
    <div class="clearfix"></div>

    {{--{{URL('search')}}--}}
    <script type="text/javascript">
        $('#search').on('keyup', function () {
            $value = $(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL('/authors/src')}}',
                data : {'search':$value},
                success: function (data) {
                    $('#searchData').html(data);

                    if($value.length > 1) {
                        $('#paginationLinks').html('');
                    }
                }
            });
        })
    </script>
@stop