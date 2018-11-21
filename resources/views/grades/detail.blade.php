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

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Peticiones de FCT") }} : {{ $petitionsFCT->count() }} 
                <div class="col-md-1 pull-right">
                    <form action="{{ route('filterPetitions', ['type'=>"FCT", 'grade'=>$grade->id]) }}" method="POST">
                    {{csrf_field()}}
                        <button class="btn btn-primary btn-xs pull-right" type="submit">PDF</button>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                @forelse($petitionsFCT as $petition)
                <div style="margin:2% 0" class="row">
                    <div class="col-md-10">
                        {{ __("Petición para la empresa") }} : 
                        <a href="../companies/{{ $petition->company->id }}">{{ $petition->company->name }}</a>
                        {{ __(" - Nº de estudiantes ") }} : {{ $petition->n_students }}
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('deletePetition2', ['petition'=>$petition->id, 'grade'=>$grade->id]) }}" method="POST">
                        {{csrf_field()}}
                            <button onclick="return confirm('Estás seguro?')"  class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                @empty
                    {{ __("No hay peticiones para el ciclo") }}
                @endforelse
            </div>
        </div>

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Peticiones de DUAL") }} : {{ $petitionsDUAL->count() }} 
                <div class="col-md-1 pull-right">
                    <form action="{{ route('filterPetitions', ['type'=>"DUAL", 'grade'=>$grade->id]) }}" method="POST">
                    {{csrf_field()}}
                        <button class="btn btn-primary btn-xs pull-right" type="submit">PDF</button>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                @forelse($petitionsDUAL as $petition)
                <div style="margin:2% 0" class="row">
                    <div class="col-md-10">
                        {{ __("Petición para la empresa") }} : 
                        <a href="../companies/{{ $petition->company->id }}">{{ $petition->company->name }}</a>
                        {{ __(" - Nº de estudiantes ") }} : {{ $petition->n_students }}
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('deletePetition2', ['petition'=>$petition->id, 'grade'=>$grade->id]) }}" method="POST">
                        {{csrf_field()}}
                            <button onclick="return confirm('Estás seguro?')"  class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                @empty
                    {{ __("No hay peticiones para el ciclo") }}
                @endforelse
            </div>
        </div>

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Peticiones de Empleo") }} : {{ $petitionsEmpleo->count() }} 
                <div class="col-md-1 pull-right">
                    <form action="{{ route('filterPetitions', ['type'=>"Empleo", 'grade'=>$grade->id]) }}" method="POST">
                    {{csrf_field()}}
                        <button class="btn btn-primary btn-xs pull-right" type="submit">PDF</button>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                @forelse($petitionsEmpleo as $petition)
                <div style="margin:2% 0" class="row">
                    <div class="col-md-10">
                        {{ __("Petición para la empresa") }} : 
                        <a href="../companies/{{ $petition->company->id }}">{{ $petition->company->name }}</a>
                        {{ __(" - Nº de estudiantes ") }} : {{ $petition->n_students }}
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('deletePetition2', ['petition'=>$petition->id, 'grade'=>$grade->id]) }}" method="POST">
                        {{csrf_field()}}
                            <button onclick="return confirm('Estás seguro?')"  class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                @empty
                    {{ __("No hay peticiones para el ciclo") }}
                @endforelse
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