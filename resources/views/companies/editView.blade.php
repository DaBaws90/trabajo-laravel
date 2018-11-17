@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin:0 auto" class="row">
        <div style="left:15%"class="col-md-8 offset-md-2">
            @include('partials.errors')
                <form method="POST" action="{{ route('companies.update', $company->id) }}" role="form"> 
                    {{ csrf_field() }}

                    <input name="_method" type="hidden" value="PATCH"/>
                    <input name="id" type="hidden" value="{{ $company->id }}"/>

                    <div class="form-group"> 
                        <label for="name" class="col-md-12 control-label"> 
                            {{ __("Nombre") }} 
                        </label>
                        <input id="name" class="form-control" name="name" value="{{ old('name', $company->name) }}" /> 
                    </div>

                    <div class="form-group"> 
                        <label for="city" class="col-md-12 control-label"> 
                            {{ __("Ciudad")}}
                        </label> 
                        <input id="city" class="form-control" name="city" value="{{ old('city', $company->city) }}" />
                    </div>

                    <div class="form-group"> 
                        <label for="cp" class="col-md-12 control-label"> 
                            {{ __("Código postal")}}
                        </label> 
                        <input id="cp" class="form-control" name="cp" value="{{ old('cp', $company->cp) }}" />
                    </div>

                    {{-- <div class="form-group">
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
                    </div> --}}

                    <div style="margin-top:4%" class="row">
                        <div class="col-md-5">
                            <a href="{{ route('companies.show', $company->id) }}" class="btn btn-default pull-left">
                                {{ __("Volver atrás") }}
                            </a>
                        </div>
                        <div class="col-md-7">
                            <button style="display:block" type="submit" name="editCompany" class="btn btn-primary"> 
                                {{ __("Editar eempresa") }} 
                            </button>
                        </div>
                        
                    </div>
                </form>
            
        </div>
    </div>
</div>

@endsection