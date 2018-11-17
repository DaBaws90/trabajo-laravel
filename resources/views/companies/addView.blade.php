@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div style="left:15%" class="col-md-8 offset-md-2">
            <div style="margin:0 auto">
                <h2 style="text-align:center">{{ __("Añadir una nueva empresa") }}</h2>
                <hr />
                @include('partials.errors')

                <a class="btn btn-default pull-right" href="{{ route('companies.index') }}">Volver atrás</a>

                <form method="POST" action="{{ route('companies.store') }}" role="form"> {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-md-12 control-label">
                            {{ __("Nombre") }}
                        </label>
                        <input id="name" class="form-control" name="name" value="{{ old('name') }}" /> 
                    </div>

                    <div class="form-group">
                        <label for="city" class="col-md-12 control-label">
                            {{ __("Ciudad")}}
                        </label>
                        <input id="city" class="form-control" name="city" value="{{ old('city') }}" />
                    </div>

                    <div class="form-group">
                        <label for="cp" class="col-md-12 control-label">
                            {{ __("Código postal")}}
                        </label>
                        <input id="cp" type="number" class="form-control" name="cp" value="{{ old('cp') }}" />
                    </div>

                    {{-- <div class="form-group">
                        <label for="grados" class="col-md-12 control-label">
                            {{ __("Grado")}}
                        </label>
                        <select id="grados" class="form-control" name="id_grade">
                        @forelse($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @empty
                            {{ __("No hay ningún grado registrado en este momento")}}
                        @endforelse
                        </select>
                    </div> --}}
                    
                    <input style="margin:4% 0" type="submit" value="Añadir empresa" class="btn btn-block btn-primary"/>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection