<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BookR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="{{asset('assets/scripts/font-awesome.min.css')}}">--}}

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    {{--<link rel="stylesheet" href="{{asset('assets/scripts/ionicons.min.css')}}">--}}

    <!-- daterange picker -->
    {{--<link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">--}}
    <!-- bootstrap datepicker -->
    {{--<link rel="stylesheet" href="{{asset('assets/plugins/datepicker/datepicker3.css')}}">--}}
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('assets/plugins/iCheck/all.css')}}">
    <!-- Bootstrap Color Picker -->
    {{--<link rel="stylesheet" href="{{asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">--}}
    <!-- Bootstrap time Picker -->
    {{--<link rel="stylesheet" href="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}">--}}
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('topscripts')

    {{--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vibur" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gudea:300,400,600,700" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{--Noto sans e okej--}}
    <style>
        html, body {
            /*font-family: 'Source Sans Pro', sans-serif;*/
            /*font-family: 'Droid Sans', sans-serif;*/
            /*font-weight: normal;*/
            /*font-family: 'Source Sans Pro', sans-serif;*/
            /*font-family: 'Lato', sans-serif;*/
            font-family: 'Roboto', sans-serif;
            /*font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;*/
            /*font-weight: 600;*/
        }
    </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{URL('/library/')}}" class="navbar-brand">
                        {{--<b>Book</b>R--}}
                        <img src="{{asset('logo.png')}}" style="margin-top: -15px">
                    </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        @if(Route::current()->getName() == 'home' || Route::current()->getName() == 'book' || Route::current()->getName() == 'category' || Route::current()->getName() == 'author' || Route::current()->getName() == 'search')
                            <li class="active"><a href="{{URL('/library/')}}">Library <span class="sr-only">(current)</span></a></li>
                        @else
                            <li><a href="{{URL('/library/')}}">Library <span class="sr-only">(current)</span></a></li>
                        @endif

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">

                                <li><a href="{{URL('/authors')}}">Authors</a></li>
                                <li><a href="{{URL('/categories')}}">Categories</a></li>
                                <li class="divider"></li>
                                <li><a href="{{URL('/library/orderby=bestsellers_rank')}}">Best Sellers</a></li>
                                <li><a href="{{URL('/library/orderby=publication_date')}}">Newest Releases</a></li>
                                <li><a href="{{URL('/library/orderby=id')}}">Recently Added</a></li>
                            </ul>
                        </li>

                        @if(Route::current()->getName() == 'cart')
                            <li class="active"><a href="{{URL('/cart/')}}">Cart</a></li>
                        @else
                            <li><a href="{{URL('/cart/')}}">Cart</a></li>
                        @endif

                    </ul>

                    <form method="GET" name="" class="navbar-form navbar-left" role="search" action="{{URL('search')}}">
                        <div class="form-group">
                            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                            <input type="text" name="query" class="form-control" id="navbar-search-input" placeholder="Search">
                        </div>
                    </form>

                </div>
                <!-- /.navbar-collapse -->

                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        @if(Auth::user()->isAdministrator())
                            <ul class="nav navbar-nav">
                                @if(Route::current()->getName() == 'admin')
                                    <li class="active"><a href="{{URL('/admin/')}}">Admin Panel</a></li>
                                @else
                                    <li><a href="{{URL('/admin/')}}">Admin Panel</a></li>
                                @endif
                            </ul>
                        @endif

                        <!-- Notifications Menu -->
                        <li class="dropdown notifications-menu skin-blue">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">{{$newest_releases_count}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Recently Added:</li>
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu">
                                        @foreach ($newest_releases as $new_release)
                                            <li>
                                                @if(file_exists('covers/'.$new_release->id.'.png'))
                                                    <a href="{{URL('/book/'.$new_release->id)}}">
                                                        <img src="{{asset('covers/'.$new_release->id.'.png')}}" width="20px"> {{$new_release -> name}}
                                                    </a>
                                                @else
                                                    <a href="{{URL('/book/'.$new_release->id)}}">
                                                        <img src="{{asset('covers/0.png')}}" width="20px"> {{$new_release -> name}}
                                                    </a>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                @if(file_exists('users/'.Auth::user()->id.'.jpg'))
                                    <img src="{{asset('users/'.Auth::user()->id.'.jpg')}}" class="user-image" alt="User Image">
                                @else
                                    <img src="{{asset('users/0.jpg')}}" class="user-image" alt="User Image">
                                @endif

                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">

                                    @if(file_exists('users/'.Auth::user()->id.'.jpg'))
                                        <img src="{{asset('users/'.Auth::user()->id.'.jpg')}}" class="img-circle" alt="User Image">
                                    @else
                                        <img src="{{asset('users/0.jpg')}}" class="img-circle" alt="User Image">
                                    @endif

                                    <p>
                                        {{ Auth::user()->name }}
                                        <small>{{ Auth::user()->email }}</small>
                                        <small>Member Since: {{date('jS F Y', strtotime(Auth::user()->created_at)) }}</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-primary">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-primary"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Log Out
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container" style="padding-top: 40px">
            <!-- Content Header (Page header) -->
            {{--<section class="content-header">--}}
                {{--<h1>--}}
                    {{--Top Navigation--}}
                    {{--<small>Example 2.0</small>--}}
                {{--</h1>--}}
                {{--<ol class="breadcrumb">--}}
                    {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
                    {{--<li><a href="#">Layout</a></li>--}}
                    {{--<li class="active">Top Navigation</li>--}}
                {{--</ol>--}}
            {{--</section>--}}

            <!-- Main content -->
            <section class="content"  style="margin-top: 20px">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.1
            </div>
            <strong>Developed by <a href="http://petkoski.com" target="_blank">Jovan Petkoski</a></strong>
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('assets/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('assets/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('assets/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
{{--<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>--}}
<!-- bootstrap datepicker -->
{{--<script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>--}}
<!-- bootstrap color picker -->
{{--<script src="{{asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>--}}
<!-- bootstrap time picker -->
{{--<script src="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>--}}
<!-- SlimScroll 1.3.0 -->
<script src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('assets/plugins/iCheck/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>

@yield('bottomscripts')

</body>
</html>
