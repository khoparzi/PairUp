<!DOCTYPE html>
<html lang="en" hola_ext_inject="disabled">
    @include('layouts.partials.head')
    <body>
        <div class="container">
            @include('layouts.partials.menu')
            @if(isset($message))
				<div class="panel panel-{{$message['level'] or 'default'}}">
				@if (isset($message['title']))
				<div class="panel-heading">{{$message['title']}}</div>
				@endif
				<div class="panel-body">{{$message['body'] or $message}}</div>
				</div>
            @endif
            @yield('content')
        </div> <!-- /container -->

        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
