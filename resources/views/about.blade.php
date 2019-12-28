<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BookR</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        {{--<link rel="stylesheet" href="../../public/css/font-awesome/font-awesome.css" type="text/css">--}}
        {{--<link rel="stylesheet" href="../../public/css/base.css" type="text/css"/>--}}
        {{--<link rel="stylesheet" href="../../public/css/style.css" type="text/css"/>--}}
        <link rel="stylesheet" href="../../public/css/buttons.css" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background: url({{asset('assets/dist/img/bg2.png')}}) no-repeat center center fixed;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            /*.links > a {*/
                /*color: #636b6f;*/
                /*padding: 0 25px;*/
                /*font-size: 12px;*/
                /*font-weight: 600;*/
                /*letter-spacing: .1rem;*/
                /*text-decoration: none;*/
                /*text-transform: uppercase;*/
            /*}*/

            .m-b-md {
                margin-bottom: 30px;
            }

            a {
                text-decoration: none;
            }

            .i-cta-2 {
                font-family: 'Raleway', sans-serif;
                font-size: 18px;
                font-weight: bold;
                letter-spacing: 0;
                text-transform: uppercase;
                line-height: 16px;
                display: inline-block;
                cursor: pointer;
                border: 2px solid rgba(255, 255, 255, 0.8);
                background-color: transparent;
                padding: 8px;
                color: rgba(255, 255, 255, 0.8);
                border-radius: 0px;
            }

            .i-cta-2:hover {
                background-color: rgba(255, 255, 255, 0.8);
                border-color: rgba(255, 255, 255, 0.8);
                color: rgba(255, 255, 255, 0.9);
                border-radius: 0px;
            }

            .ghost-button-transition {
                display: inline-block;
                width: 120px;
                padding: 8px;
                padding-bottom: 10px;
                color: #fff;
                border: 2px solid #fff;
                text-align: center;
                outline: none;
                text-decoration: none;
                transition: background-color 0.1s ease-out,
                color 0.1s ease-out;
            }
            .ghost-button-transition:hover,
            .ghost-button-transition:active {
                background-color: #fff;
                color: #000;
                transition: background-color 0.2s ease-in,
                color 0.2s ease-in;
            }

            body {
                overflow:hidden;
            }

        </style>

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body>

        <a href="{{ url('/') }}" class="ghost-button-transition" style="position: relative; left: 10px; top: 10px; font-family: 'Lato', sans-serif;">BACK</a>


        @if (Route::has('login'))
                @if (Auth::check())
                    <a href="{{ url('/library') }}" class="ghost-button-transition" style="position: relative; left: 1071px; top: 10px; font-family: 'Lato', sans-serif;">HOME</a>
                @else
                    <a href="{{ url('/login') }}" class="ghost-button-transition" style="position: relative; left: 921px; top: 10px; font-family: 'Lato', sans-serif;">LOGIN</a>
                    <a href="{{ url('/register') }}" class="ghost-button-transition" style="position: relative; left: 927px; top: 10px; font-family: 'Lato', sans-serif;">REGISTER</a>
                @endif
        @endif

        {{--<a href="https://superdevresources.com/super-simple-ghost-button-css/" class="ghost-button-transition" target="_blank">Ghost Button</a>--}}

        <div class="flex-center position-ref full-height">

            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--@if (Auth::check())--}}
                        {{--<a href="{{ url('/home') }}" class="ghost-button-transition" style="position: relative; left: 200px; top: 10px;">Home</a>--}}
                    {{--@else--}}
                        {{--<a href="{{ url('/login') }}" class="ghost-button-transition" style="position: relative; left: 200px; top: 10px;">Login</a>--}}
                        {{--<a href="{{ url('/register') }}" class="ghost-button-transition" style="position: relative; left: 400px; top: 10px;">Register</a>--}}



                        {{--<div class="btn btn-default btn-flat">--}}
                            {{--<a href="{{ url('/login') }}" style="color: #000000">Login</a>--}}
                        {{--</div>--}}
                        {{--<div class="btn btn-default btn-flat">--}}
                            {{--<a href="{{ url('/register') }}" style="color: #000000">Register</a>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--@endif--}}

            <div class="content">
                {{--<div class="title m-b-md" style="color: rgba(0,0,0,0.6); font-size: 100px; margin-top: -90px;">--}}
                    {{--BookR--}}
                {{--</div>--}}
                <div class="" style="color: rgba(0,0,0,0.8); font-size: 15px; font-weight: normal; font-family: 'Lato', sans-serif; text-align: left; margin-left: 80px; margin-right: 80px;">
                    <p>
                        BookR leverages the power to offer online customers the Web's premier destination for books, eBooks, magazines and related products and services.
                    </p>



                    <p style="margin-top: 30px">
                        <b>The Internet's Largest Bookstore</b>
                    </p>
                    <p>
                        Taking advantage of vast warehouses across the world, we stock over 1 million titles for immediate delivery - that's more titles than any other online bookseller.
                    </p>
                    <p>
                        With so many titles, it is vital to give customers an easy way to find precisely the books they are looking for. Our search engine enables customers to locate books by title, author, or keyword in a few seconds at most. Customers with a general idea of what they want can use our Browse pages to sift through hundreds of categories to find exactly the right book. To further assist users, we offer descriptions and reviews, and our See Inside program lets customers read excerpts from tens of thousands of titles. We also offer editor recommendations and customer reviews on hundreds of thousands of titles.
                    </p>
                    <p>
                        BookR offers millions of new and used items from a network of trusted Sellers, often at discounted prices - all with the security and guarantee. Our special collection of Rare & Collectible Books features unique finds such as signed and first editions and out of print books.
                    </p>



                    <p style="margin-top: 30px">
                        <b>More than Books</b>
                    </p>
                    <p>
                        BookR is the ideal destination for anyone looking for the best in children's books, eBooks and magazines. With age-based recommendations, as well as specialty stores that cater to Harry Potter and other big titles, it's the ultimate one-stop shop for kids.
                    </p>



                    <p style="margin-top: 30px">
                        <b>BookR Makes Shopping Easy</b>
                    </p>
                    <p>
                        BookR Members get Unlimited Free Member Express Shipping in 3 days or less on eligible orders. Non-members can get Free Shipping on orders of $25 or more of eligible items. We even offer Same Day Delivery to Macedonia at no extra charge.
                    </p>
                </div>

                {{--<div class="links">--}}
                    {{--<a href="https://laravel.com/docs">Documentation</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </body>
</html>
