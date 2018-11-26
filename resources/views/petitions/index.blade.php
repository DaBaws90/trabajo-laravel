@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        
        
        
        
        
        
        
        @forelse($petitions as $petition)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                <a href="petitions/detail/{{ $petition->id }}">              
                <div class="panel-heading panel-heading-forum">
                {{ __("Nombre de la Empresa: ") }} {{ $petition->company->name }}
                <a href="{{ route('deletePetition', $petition->id) }}" class="btn btn-danger btn-xs pull-right"><i class="far fa-trash-alt"></i></a>
                </div>

                <div class="panel-heading panel-heading-forum">
                {{ __("Nombre del Ciclo: ") }} {{ $petition->grade->name }}
                </div>

                <div class="panel-heading panel-heading-forum">
                {{ __("Tipo de Petición: ") }} {{ $petition->type }} 
                </div>

                <div class="panel-heading panel-heading-forum">
                {{ __("Alumnos Requeridos: ") }} {{ $petition->n_students }} 
                </div>
               
                
            
            </a>                
               
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
                    
                    <select id="type" class="form-control" name="type">
                        
                            <option value="DUAL">DUAL</option>
                            <option value="FCT">FCT</option>
                            <option value="Empleo">Empleo</option>

                                                    
                        </select>
                </div>
                

                <div class="form-group">
                    <label for="company" class="col-md-12">
                        {{ __("Empresas")}}
                    </label>
                    <select id="id_company" class="form-control" name="id_company">
                    @forelse($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @empty
                        {{ __("No hay ningua empresa registrada en este momento")}}
                    @endforelse
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="grades" class="col-md-12">
                        {{ __("Ciclo")}}
                    </label>
                    <select id="id_grade" class="form-control" name="id_grade">
                    @forelse($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @empty
                        {{ __("No hay ningún ciclo registrado en este momento")}}
                    @endforelse
                    </select>
                </div>

                
                <button style="margin:3% auto;display:block"  type="submit" name="addPetition" class="btn btn-primary"> 
                    {{ __("Añadir Peticion") }} 
                </button>
            </form>
        </div>
    </div>
</div>
@endsection