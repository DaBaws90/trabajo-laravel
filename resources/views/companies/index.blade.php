@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-mute"> {{ __("Empresas") }} </h1>
        @forelse($companies as $company)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                <a href="companies/{{ $company->id }}"> {{ $company->name }} </a>
            </div>
            <div class="panel-body">
                {{ $company->city }} - {{ $company->cp }}
            </div>
        </div>
        @empty
        <div class="alert alert-danger">
            {{ __("Todavía no hay ninguna empresa registrada en el sistema") }}
        </div>
        @endforelse
        <!-- Navegación -->
        <div style="margin:0 auto">
            @if($companies->count())
                {{$companies->links()}}
            @endif
            <h2>{{ __("Añadir una nueva empresa") }}</h2>
            <hr />
            @include('partials.errors')
            <form method="POST" action="companies"> {{ csrf_field() }}
                <div class="form-group"> 
                    <label for="name" class="col-md-12 control-label"> 
                        {{ __("Nombre") }} 
                    </label>
                    <input id="name" class="form-control" name="name" value="{{ old('name') }}" /> </div>
                <div class="form-group"> 
                    <label for="lastname" class="col-md-12 control-label"> 
                        {{ __("Ciudad")}}
                    </label> 
                    <input id="city" class="form-control" name="city" value="{{ old('city') }}" />
                </div>
                <div class="form-group"> 
                    <label for="cp" class="col-md-12 control-label"> 
                        {{ __("Código postal")}}
                    </label> 
                    <input id="cp" class="form-control" name="cp" value="{{ old('cp') }}" />
                </div>
                <button type="submit" name="addCompany" class="btn btn-default"> 
                    {{ __("Añadir empresa") }} 
                </button>
            </form>
        </div>
    </div>
</div>
@endsection