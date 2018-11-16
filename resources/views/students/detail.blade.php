@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> {{ __("Detalles del estudiante :name", ['name' => $student->name]) }} </h1>

        <div style="margin-top:4%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Nombre") }} : {{ $student->name }} {{ $student->lastname }}
            </div>
            <div class="panel-body">
                <p>{{ __("Edad") }} : {{ $student->age }}</p>
            </div>
        </div>

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Ciclos que cursa el alumno") }} : {{ $student->studies->count() }}
            </div>
            <div class="panel-body">
                @forelse($student->studies as $study)
                <div style="margin:3% 0" class="row">
                    <div class="col-md-6">
                        {{ __("Ciclo") }} : <a href="grades/{{$study->grade->id}}">{{ $study->grade->name }}</a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('deleteStudy',['id'=> $study->id]) }}" method="POST">
                            {{csrf_field()}}
                            <button onclick="return confirm('Estás seguro?')"  class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="row">
                    <div class="col-md-6">
                        {{ __("No hay ciclos que visualizar. ¿Desea eliminar el estudiante?")}}
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button onclick="return confirm('Estás seguro?')" class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div style="margin-bottom:3%" class="row">
    <div class="col-md-8 col-md-offset-2">
        <a href="{{ route('students.index') }}" class="btn btn-default pull-left">
            {{ __("Volver atrás") }}
        </a>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary pull-right">
            {{ __("Editar") }}
        </a>
    </div>
</div>

@endsection