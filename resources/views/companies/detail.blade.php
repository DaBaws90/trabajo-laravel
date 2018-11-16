@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> {{ __("Detalles de la empresa :name", ['name' => $company->name]) }} </h1>

        <div style="margin-top:4%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Nombre") }} : {{ $company->name }}
            </div>
            <div class="panel-body">
                <p>{{ __("Ciudad") }} : {{ $company->city }}</p>
                <p>{{ __("Código postal") }} : {{ $company->cp }}</p>
            </div>
        </div>

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Peticiones totales registradas para la empresa") }} : {{ $company->petitions->count() }}
            </div>
        </div>

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Peticiones FCT registradas") }} : {{ $petitionsFCT->count() }}
            </div>
            <div class="panel-body">
                @forelse($petitionsFCT as $petition)
                <div style="margin:3% 0" class="row">
                    <div class="col-md-6">
                        {{ __("Petición") }} : <a href="../grades/{{$petition->grade->id}}">Petición para el grado {{ $petition->grade->name }}</a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('deletePetition',['id'=> $petition->id]) }}" method="DELETE">
                            {{csrf_field()}}
                            <button onclick="return confirm('Estás seguro?')"  class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="row">
                    <div class="col-md-12">
                        {{ __("No hay peticiones FCT que visualizar.")}}
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Peticiones DUAL registradas") }} : {{ $petitionsDUAL->count() }}
            </div>
            <div class="panel-body">
                @forelse($petitionsDUAL as $petition)
                <div style="margin:3% 0" class="row">
                    <div class="col-md-6">
                        {{ __("Petición") }} : <a href="../grades/{{$petition->grade->id}}">Petición para el grado {{ $petition->grade->name }}</a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('deletePetition',['id'=> $petition->id]) }}" method="DELETE">
                            {{csrf_field()}}
                            <button onclick="return confirm('Estás seguro?')"  class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="row">
                    <div class="col-md-12">
                        {{ __("No hay peticiones DUAL que visualizar.")}}
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Peticiones Empleo registradas") }} : {{ $petitionsEmpleo->count() }}
            </div>
            <div class="panel-body">
                @forelse($petitionsEmpleo as $petition)
                <div style="margin:3% 0" class="row">
                    <div class="col-md-6">
                        {{ __("Petición") }} : <a href="../grades/{{$petition->grade->id}}">Petición para el grado {{ $petition->grade->name }}</a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('deletePetition',['id'=> $petition->id]) }}" method="DELETE">
                            {{csrf_field()}}
                            <button onclick="return confirm('Estás seguro?')"  class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="row">
                    <div class="col-md-12">
                        {{ __("No hay peticiones Empleo que visualizar.")}}
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        
        @forelse($company->petitions as $petition)
        @empty
        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                <div class="row">
                    <div class="col-md-6">
                        {{ __("No quedan peticiones registradas. ¿Desea eliminar la empresa?")}}
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button onclick="return confirm('Estás seguro?')" class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            
        @endforelse
    </div>
</div>

<div style="margin-bottom:3%" class="row">
    <div class="col-md-8 col-md-offset-2">
        <a href="{{ route('companies.index') }}" class="btn btn-default pull-left">
            {{ __("Volver atrás") }}
        </a>
        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary pull-right">
            {{ __("Editar") }}
        </a>
    </div>
</div>

@endsection