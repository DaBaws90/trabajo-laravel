@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-mute"> {{ __("Ciclos") }} </h1>
        @forelse($grades as $grade)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                <a href="grades/{{ $grade->id }}"> {{ $grade->name }} {{ $grade->level }} </a>
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
            <h2>{{ __("Añadir un nuevo Ciclo") }}</h2>
            <hr />
            @include('partials.errors')
            <form method="POST" action="students"> {{ csrf_field() }}
                <div class="form-group"> 
                    <label for="name" class="col-md-12 control-label"> 
                        {{ __("Nombre") }} 
                    </label>
                    <input id="name" class="form-control" name="name" value="{{ old('name') }}" /> </div>
                <div class="form-group"> 
                    <label for="lastname" class="col-md-12 control-label"> 
                        {{ __("Apellidos")}}
                    </label> 
                    <input id="lastname" class="form-control" name="lastname" value="{{ old('lastname') }}" />
                </div>
                <div class="form-group"> 
                    <label for="age" class="col-md-12 control-label"> 
                        {{ __("Edad")}}
                    </label> 
                    <input id="age" class="form-control" name="age" value="{{ old('age') }}" />
                </div>
                <button type="submit" name="addStudent" class="btn btn-default"> 
                    {{ __("Añadir estudiante") }} 
                </button>
            </form>
        </div>
    </div>
</div>
@endsection