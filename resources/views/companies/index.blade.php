@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 style="margin: 2% 0 5% 0" class="text-center text-mute"> {{ __("Empresas") }} </h1>
        @forelse($companies as $company)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                <a href="companies/{{ $company->id }}"> {{ $company->name }} </a>
                <a href="{{ route('deleteCompany', $company->id) }}" class="pull-right"><i class="far fa-trash-alt"></i></a>
            </div>
        </div>
        @empty
        <div class="alert alert-danger">
            {{ __("Todvía no hay ninguna empresa registrada en el sistema") }}
        </div>
        @endforelse

        <!-- Navegación -->
        <div style="text-align:center">
            @if($companies->count())
                {{$companies->links()}}
            @endif
        </div>

        <div style="margin:0 auto">
            <h2 style="text-align:center">{{ __("Añadir una nueva empresa") }}</h2>
            <hr />
            @include('partials.errors')

            <form method="POST" action="companies"> {{ csrf_field() }}
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

                <button style="margin:3% auto;display:block" type="submit" name="addCompany" class="btn btn-default">
                    {{ __("Añadir empresa") }}
                </button>
            </form>

        </div>
        
    </div>
</div>
@endsection