<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        @include('layouts.partials.dashboard.sidebar')
        <div id="content">
            @include('layouts.partials.dashboard.navbar')
            
            @include('sweetalert::alert')

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="d-flex">
                        <div>
                            @yield('greeting')
                        </div>
                        <div class="ml-auto">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">@yield('breadcrumb-title')</a></li>
                                    <li class="breadcrumb-item"><a href="#">@yield('breadcrumb') </a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    @yield('addedJS')
</body>
</html>
