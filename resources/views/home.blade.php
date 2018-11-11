@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    @auth
    <?php header("Refresh:4; url='.'"); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-8 offset-md-8">
                <div class="links">
                    <a href="{{ url('/students') }}">Estudiantes</a>
                    <a href="{{ url('/companies') }}">Empresas</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </div>
    @endauth
</div>
@endsection
