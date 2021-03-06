<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Escuela Empresa</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div style="margin-right:3%" class="top-right links">
                    @auth
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Escuela Empresa
                </div>
                @auth
                    <p style="font-size:22px">Comience a gestionar registros</p>
                    <div class="links">
                        <a href="{{ url('/students') }}">Estudiantes</a>
                        <a href="{{ url('/companies') }}">Empresas</a>
                        <a href="{{ url('/grades') }}">Ciclos</a>
                        <a href="{{ url('/petitions') }}">Peticiones</a>
                        <a href="https://github.com/DaBaws90/trabajo-laravel">GitHub</a>
                    </div>
                @else
            <!-- @include("partials.login_link", ["message" => __("Inicie sesión para comenzar a gestionar los registros")]) -->
                    <p>Inicie sesión para comenzar a gestionar los registros</p>
                @endauth
            </div>
        </div>
    </body>
</html>
