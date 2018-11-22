@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> {{ __("Detalles de la Petición: :id", ['id' => $petition->id]) }} </h1>

        <div style="margin-top:4%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Empresa") }} : {{ $petition->company->name }} 
            </div>
            <div class="panel-body">
                <p>{{ __("Ciclo") }} : {{ $petition->grade->name }}</p>
            </div>
            <div class="panel-body">
                <p>{{ __("IDENTIFICADOR: ") }} : {{ $petition->id }}</p>
            </div>
        </div>

        
    </div>
</div>

<div style="margin-bottom:3%" class="row">
    <div class="col-md-8 col-md-offset-2">
        <a href="{{ route('listPetitions') }}" class="btn btn-default pull-left">
            {{ __("Volver atrás") }}
        </a>
        
        <a href="{{ route('editViewPetition', $petition->id) }}" class="btn btn-primary pull-right">
            {{ __("Editar") }}
        </a>
    </div>
</div>

@endsection