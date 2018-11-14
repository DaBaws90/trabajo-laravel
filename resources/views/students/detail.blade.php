@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> {{ __("Detalles del estudiante :name", ['name' => $student->name]) }} </h1>
        <div class="clearfix"></div>

        <div style="margin-top:3%" class="panel panel-default">
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
        <a href="{{ route('students.index') }}" class="btn btn-info pull-left">
            {{ __("Volver atrás") }}
        </a>
        <a href="{{ action('StudentController@edit', $student->id) }}" class="btn btn-primary pull-right">
            {{ __("Editar") }}
        </a>
    </div>
</div>

@endsection