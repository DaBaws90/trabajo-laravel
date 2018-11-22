@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin:0 auto" class="row">
        <div style="left:15%"class="col-md-8 offset-md-2">
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

                
                <a href="{{ route('listPetitions') }}" class="btn btn-info pull-left">
                        {{ __("Volver atrás") }}
                    </a>
                    <button  style="margin:5% auto;display:block" type="submit" name="editPetition" class="btn btn-default"> 
                        {{ __("Editar Peticion") }} 
                    </button>
           
            
        </div>
    </div>
</div>

@endsection