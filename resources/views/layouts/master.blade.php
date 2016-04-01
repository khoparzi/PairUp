<!DOCTYPE html>
<html lang="en" hola_ext_inject="disabled">
    @include('layouts.partials.head')
    <body>
        <div class="container">
            @include('layouts.partials.menu')
            @yield('content')
        </div> <!-- /container -->

        <script src="{{ elixir('assets/js/all.js') }}"></script>
    </body>
</html>
