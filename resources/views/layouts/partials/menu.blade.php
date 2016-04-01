<nav class="navbar navbar-light bg-faded">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header">
        ☰
    </button>
    <div class="collapse navbar-toggleable-xs" id="navbar-header">
        <a class="navbar-brand" href="#">Navbar</a>
        <ul class="nav navbar-nav">
            @if ($username)
                <li class="nav-item">
                    <a class="nav-link" href="/auth/logout">Logout {{ $username }}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/auth/login">{{ trans("public.links.login") }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/auth/register">{{ trans("public.links.register") }}</a>
                </li>
            @endif
        </ul>
    </div>
</nav> <!-- /navbar -->
