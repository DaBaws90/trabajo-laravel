@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin:0 auto" class="row">
        <div style="left:15%"class="col-md-8 offset-md-2">
            @include('partials.errors')
                <form method="POST" action="{{ route('editGrade', $grade->id) }}"> {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $grade->id }}"/>

                    <div class="form-group"> 
                        <label for="name" class="col-md-12 control-label"> 
                            {{ __("Nombre del Ciclo") }} 
                        </label>
                        <input id="name" class="form-control" name="name" value="{{ old('name', $grade->name) }}" /> 
                    </div>

                    <div class="form-group"> 
                        <label for="level" class="col-md-12 control-label"> 
                            {{ __("Curso")}}
                        </label> 
                        <input id="level" class="form-control" name="level" value="{{ old('level', $grade->level) }}" />
                    </div>

                   

                    <button  style="margin:5% auto;display:block" type="submit" name="editGrade" class="btn btn-default"> 
                        {{ __("Editar Ciclo") }} 
                    </button>
                </form>
            
        </div>
    </div>
</div>

@endsection