@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> {{ __("Detalles del estudiante :name", ['name' => $student->name]) }} </h1>
        <a style="margin:3% auto" href="/escuelaempresa/public/students" class="btn btn-info pull-left">
            {{ __("Volver al listado de estudiantes") }}
        </a>
        <div class="clearfix"></div>
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Nombre") }} : {{ $student->name }} {{ $student->lastname }}
            </div>
            <div class="panel-body">
                {{ __("Edad") }} : {{ $student->age }}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @auth
        <a style="margin-left:2%" href="{{ route('editView', $student->id) }}" class="btn btn-primary pull-right">
            {{ __("Editar estudiante") }}
        </a>
        <a href="{{ route('editView', $student->id) }}" class="btn btn-primary pull-right">
            {{ __("Eliminar estudiante") }}
        </a>
        @else
        @include("partials.login_link", ["message" => __("Inicia sesión para editar el registro")])
        <!-- Añadir ruta al array para redireccionar una vez hecho login -->
        @endauth
    </div>
</div>
@endsection