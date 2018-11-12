@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 style="margin: 2% 0 5% 0" class="text-center text-mute"> {{ __("Estudiantes") }} </h1>
        @forelse($students as $student)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                <a href="students/{{ $student->id }}"> {{ $student->name }} {{ $student->lastname }} </a>
            </div>
        </div>
        @empty
        <div class="alert alert-danger">
            {{ __("Todvía no hay ningún estudiante registrado en el sistema") }}
        </div>
        @endforelse

        <!-- Navegación -->
        <div style="text-align:center">
            @if($students->count())
                {{$students->links()}}
            @endif
        </div>

        <div style="margin:0 auto">
            <h2 style="text-align:center">{{ __("Añadir un nuevo estudiante") }}</h2>
            <hr />
            @include('partials.errors')

            <form method="POST" action="students"> {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-md-12 control-label">
                        {{ __("Nombre") }}
                    </label>
                    <input id="name" class="form-control" name="name" value="{{ old('name') }}" /> 
                </div>

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
                    <input id="age" type="number" class="form-control" name="age" value="{{ old('age') }}" />
                </div>

                <button type="submit" name="addStudent" class="btn btn-default">
                    {{ __("Añadir estudiante") }}
                </button>
            </form>

        </div>
        
    </div>
</div>
@endsection