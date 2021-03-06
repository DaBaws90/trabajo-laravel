@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin:0 auto" class="row">
        <div style="left:15%"class="col-md-8 offset-md-2">
            @include('partials.errors')
                <form method="POST" action="{{ route('students.update', $student->id) }}" role="form"> {{ csrf_field() }}

                    <input name="_method" type="hidden" value="PATCH"/>
                    <input name="id" type="hidden" value="{{ $student->id }}"/>

                    <div class="form-group"> 
                        <label for="name" class="col-md-12 control-label"> 
                            {{ __("Nombre") }} 
                        </label>
                        <input id="name" class="form-control" name="name" value="{{ old('name', $student->name) }}" /> 
                    </div>

                    <div class="form-group"> 
                        <label for="lastname" class="col-md-12 control-label"> 
                            {{ __("Apellidos")}}
                        </label> 
                        <input id="lastname" class="form-control" name="lastname" value="{{ old('lastname', $student->lastname) }}" />
                    </div>

                    <div class="form-group"> 
                        <label for="age" class="col-md-12 control-label"> 
                            {{ __("Edad")}}
                        </label> 
                        <input id="age" class="form-control" name="age" value="{{ old('age', $student->age) }}" />
                    </div>

                    <div class="form-group">
                        <label for="grados" class="col-md-12">
                            {{ __("Grado")}}
                        </label>
                        <select id="grados" class="form-control" name="id_grade">
                        @forelse($grades as $grade)
                            <option value="{{ old('id_grade', $grade->id) }}">{{ $grade->name }}</option>
                        @empty
                            {{ __("No hay ningún grado registrado en este momento")}}
                        @endforelse
                        </select>
                    </div>

                    <div style="margin-top:4%" class="row">
                        <div class="col-md-5">
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-default pull-left">
                                {{ __("Volver atrás") }}
                            </a>
                        </div>
                        <div class="col-md-7">
                            <button style="display:block" type="submit" name="editStudent" class="btn btn-primary"> 
                                {{ __("Editar estudiante") }} 
                            </button>
                        </div>
                        
                    </div>
                </form>
            
        </div>
    </div>
</div>

@endsection