@extends('layouts.app')

@section('content')

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

@endsection