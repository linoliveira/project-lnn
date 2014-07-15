<html>
    <head>
        <title> Autenticação </title>
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"
    </head>

    <body>
        <div class="logout">
            @yield('logout')
        </div>
        <div class="add_person">
                    @yield('add_person')
                </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>