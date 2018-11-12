@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-mute"> {{ __("Ciclos de FORMACION PROFESIONAL") }} </h1>
        @forelse($grades as $grade)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                <a href="grades/{{ $grade->id }}"> Nombre del ciclo: {{ $grade->name }} <br> Curso: {{ $grade->level }} </a>
            </div>
        </div>
        @empty
        <div class="alert alert-danger">
            {{ __("Todvía no hay ningún ciclo registrado en el sistema") }}
        </div>
        @endforelse
        <!-- Navegación -->
        <div style="margin:0 auto">
            @if($grades->count())
                {{$grades->links()}}
            @endif
            <h2>{{ __("Añadir Ciclo") }}</h2>
            <hr />
            @include('partials.errors')
            <form method="POST" action="grades"> {{ csrf_field() }}
                <div class="form-group"> 
                    <label for="name" class="col-md-12 control-label"> 
                        {{ __("Nombre") }} 
                    </label>
                    <input id="name" class="form-control" name="name" value="{{ old('name') }}" /> </div>
                <div class="form-group"> 
                    <label for="level" class="col-md-12 control-label"> 
                        {{ __("Curso")}}
                    </label> 
                    <input id="level" class="form-control" name="level" value="{{ old('level') }}" />
                </div>
                
                <button type="submit" name="addGrade" class="btn btn-default"> 
                    {{ __("Añadir Ciclo") }} 
                </button>
            </form>
        </div>
    </div>
</div>
@endsection