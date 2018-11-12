@extends('layouts.app')
@section('content')
@auth
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> {{ __("Detalles del estudiante :name", ['name' => $student->name]) }} </h1>
        <a href="/escuelaempresa/public/students" class="btn btn-info pull-left">
            {{ __("Volver al listado de estudiantes") }}
        </a>
        <div class="clearfix"></div>
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                <a href="../students/{{ $student->id }}"> {{ $student->name }} </a>
                <p class="pull-right">
                    {{ __("Nombre") }} : {{ $student->name }}
                </p>
            </div>
            <div class="panel-body">
                {{ $student->age }}
            </div>
        </div>
        
        <a href="/escuelaempresa/public/students" class="btn btn-info pull-right">
            {{ __("Volver al listado de estudiantes") }}
        </a>
        @else
        <?php header("Refresh:0; url='".route('login')."'"); ?>
        @include("partials.login_link", ["message" => __("Inicia sesión para visualizar el registro")])
        <!-- Añadir ruta al array para redireccionar una vez hecho login -->
    </div>
</div>
@endauth
@endsection