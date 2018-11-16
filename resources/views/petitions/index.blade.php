@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 style="margin: 2% 0 5% 0" class="text-center text-mute"> {{ __("Peticiones de Alumnos") }} </h1>
        @forelse($petitions as $petition)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                <a href="petitions/{{ $petition->id }}"> Identificador de la Peticion: {{ $petition->id }} <br> Alumnos Requeridos: {{ $petition->n_students }} 
               <br> Tipo de petición: {{ $petition->type }} <br> Identificador de Empresa: {{ $petition->id_company }} <br> Identificador de Ciclo: {{ $petition->id_grade }}</a>
                <a href="{{ route('deleteGrade', $petition->id) }}" class="pull-right"><i class="far fa-trash-alt"></i></a>
            </div>
        </div>
        @empty
        <div class="alert alert-danger">
            {{ __("Todvía no hay ninguna peticion registrada en el sistema") }}
        </div>
        @endforelse
        
        <!-- Navegación -->
        <div style="text-align:center">
            @if($petitions->count())
                {{$petitions->links()}}
            @endif
        </div>
        
        <div style="margin:0 auto">
            <h2 style="text-align:center">{{ __("Añadir Peticion") }}</h2>
            <hr />
            
            @include('partials.errors')
            <form method="POST" action="petitions"> {{ csrf_field() }}
                <div class="form-group"> 
                    <label for="n_students" class="col-md-12 control-label"> 
                        {{ __("Alumnos requeridos") }} 
                    </label>
                    <input id="n_students" class="form-control" name="n_students" value="{{ old('n_students') }}" /> </div>
                <div class="form-group"> 
                    <label for="type" class="col-md-12 control-label"> 
                        {{ __("Tipo de Peticion")}}
                    </label> 
                    <input id="type" class="form-control" name="type" value="{{ old('type') }}" />
                </div>
                <div class="form-group"> 
                    <label for="id_company" class="col-md-12 control-label"> 
                        {{ __("Identificador de Empresa")}}
                    </label> 
                    <input id="id_company" class="form-control" name="id_company" value="{{ old('id_company') }}" />
                </div>
                <div class="form-group"> 
                    <label for="id_grade" class="col-md-12 control-label"> 
                        {{ __("Identificador de ciclo")}}
                    </label> 
                    <input id="id_grade" class="form-control" name="id_grade" value="{{ old('id_grade') }}" />
                </div>

                <div class="form-group">
                        <label for="grados" class="col-md-12">
                            {{ __("Grado")}}
                        </label>
                        <select id="grados" class="form-control" name="id_grade">
                        @forelse($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @empty
                            {{ __("No hay ningún grado registrado en este momento")}}
                        @endforelse
                        </select>
                    </div>

                
                <button style="margin:3% auto;display:block"  type="submit" name="addPetition" class="btn btn-default"> 
                    {{ __("Añadir Peticion") }} 
                </button>
            </form>
        </div>
    </div>
</div>
@endsection