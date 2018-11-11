@extends('layouts.app')

@section('content')

@auth
<div class="row">
    <div class="col-md-8 offset-md-2">
        @include('partials.errors')
        <form method="POST" action="{{ route('editStudent', $student->id) }}"> {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $student->id }}"/>
            <div class="form-group"> 
                <label for="name" class="col-md-12 control-label"> 
                    {{ __("Nombre") }} 
                </label>
                <input id="name" class="form-control" name="name" value="{{ old('name', $student->name) }}" /> </div>
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
            <button type="submit" name="editStudent" class="btn btn-default"> 
                {{ __("Editar estudiante") }} 
            </button>
        </form>
    </div>
</div>
@else
    <div class="row">
        <div class="col-md-8 offset-md-2" style="left: 15%">
            <h2 class="text-center text-mute">No tiene permisos para llevar a cabo esta acción</h2><br/>
            <h3 class="text-center text-mute">En unos segundos, será redirigido al listado de estudiantes.</h3>
            @include("partials.login_link", ["message" => __("Pulse aquí para iniciar sesión")])
            <?php
                header("Refresh:4; url='..'");
            ?>
        </div>
    </div>
@endauth

@endsection