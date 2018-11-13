@extends('layouts.app')

@section('content')
@auth
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> {{ __("Detalles del Ciclo ':name'", ['name' => $grade->name]) }} </h1>
        <a href="{{ route('listGrades') }}" class="btn btn-info pull-left">
            {{ __("Volver al listado de Ciclos") }}
        </a>
        <div class="clearfix"></div>
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                <a href="../grades/{{ $grade->id }}"> {{ $grade->name }} </a>
                <p class="pull-right">
                    {{ __("Nombre del ciclo") }} : {{ $grade->name }}
                </p>
            </div>
            <div class="panel-body">
            {{ __("Curso") }} : {{ $grade->level }}
            </div>
        </div>
        
        <a href="{{ route('listGrades') }}" class="btn btn-info pull-right">
            {{ __("Volver al listado de Ciclos") }}
        </a>
        @else
        <?php header("Refresh:0; url='".route('login')."'"); ?>
        @include("partials.login_link", ["message" => __("Inicia sesión para visualizar el registro")])
        <!-- Añadir ruta al array para redireccionar una vez hecho login -->
    </div>
</div>
@endauth
@endsection