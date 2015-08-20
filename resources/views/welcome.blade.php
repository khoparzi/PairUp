<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="//fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                font-weight: 300;
                font-family: 'Lato';
            }

			.outer {
                width: 100%;
				height: 100%;
                display: table;
			}

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

			.menu {
				padding: 4px;
			}

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
		<div class="menu">
            @if ($username)
                <a href="/auth/logout">Logout {{ $username }}</a>
            @else
                <a href="/auth/login">Login</a> |
                <a href="/auth/register">Register</a>
            @endif
		</div>
		<div class="outer">
			<div class="container">
				<div class="content">
					<div class="title">Laravel 5</div>
				</div>
			</div>
		</div>
    </body>
</html>
