<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #FFDC4A;
                color: #2E4857;
                font-family: 'Nunito', sans-serif;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
            }
            a{
                color: #2E4857;
            }
            a:hover{
                
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/banner-1.png')}}" class="img-fluid mx-auto d-block" style="height: 70px;" alt=""></a>
                    <h1 style="margin-bottom: 0px;">Whoops!</h1>
                    @yield('message')
                   <p style="font-size: 24px">Please try again from our <a href="{{ route('home') }}">home page</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
