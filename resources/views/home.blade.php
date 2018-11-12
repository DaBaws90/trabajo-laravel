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
            <h5 class="text-center text-muted">
                Por favor, espere mientras le redireccionamos a la página principal en unos segundos.
            </h5>
        </div>
    </div>
    @auth
    <?php header("Refresh:4; url='.'"); ?>
    @endauth
</div>
@endsection
