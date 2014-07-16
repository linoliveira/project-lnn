<html>
    <head>
        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" >
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" >
        @yield('references')
    </head>
    <body>

        <div class="container">
            @if(Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            @yield('content')
        </div>

    </body>
</html>