<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
    <div class="container">
        <header class="row">
            @include('includes.header')
        </header>
        <main>
            <div id="main" class="row">
                @yield('content')
            </div>
        </main>
        <footer class="row">
            @include('includes.footer')
        </footer>
    </div>
</body>
</html>
