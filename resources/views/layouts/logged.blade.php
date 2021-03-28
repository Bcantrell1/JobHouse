<html lang="en">
    @include('layouts.loggedHeader')
    <head>
        <title>@yield('title')</title>
    </head>
    
    <body>
        <div>
            @yield('content')
        </div>
        <div class="container-fluid" style="margin: 1in;"></div>
     @include('layouts.footer')
    </body>
</html>
