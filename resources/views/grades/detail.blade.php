@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> {{ __("Detalles del Ciclo ':name'", ['name' => $grade->name]) }} </h1>
        <div class="clearfix"></div>

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Nombre del ciclo") }} : {{ $grade->name }} 
            </div>
            <div class="panel-body">
                {{ __("Curso") }} : {{ $grade->level }}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <a href="{{ route('listGrades') }}" class="btn btn-info pull-left">
            {{ __("Volver atrás") }}
        </a>
        <a href="{{ route('editViewGrades', $grade->id) }}" class="btn btn-primary pull-right">
            {{ __("Editar") }}
        </a>
        
    </div>
</div>

@endsection