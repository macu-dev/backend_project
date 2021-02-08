<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <title>@yield('title')</title>
    </head>
    <body>
        @if (\Request::is("/") )
            @include('components.headerHome')
        @elseif(\Request::is("post/create") )
            @include('components.headerPage')
        @elseif(isset($post) and \Request::is("post/$post->id"))
            @include('components.headerPage')
        @elseif(isset($post) and \Request::is("post/$post->id/edit"))
            @include('components.headerPage')
        @else
            @include('components.headerPage')
            @include('components.navbar')
        @endif

        <main class="main">
            <section class="section-primary h-100">
                <div class="container h-100 d-flex justify-content-center contenido flex-wrap">
                    {{-- @include('components.alert') --}}
                    @yield('content')
                </div>
            </section>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
    @yield('js')
</html>
