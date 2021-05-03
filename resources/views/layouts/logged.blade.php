<html lang="en">
    @include('layouts.loggedHeader')
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <div>
            @yield('content')
        </div>
     @include('layouts.footer')
    </body>
</html>