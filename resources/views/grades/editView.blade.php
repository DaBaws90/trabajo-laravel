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
                        
                        <select id="level" class="form-control" name="level">
                        
                            <option value="FPB">FPB</option>
                            <option value="CFGM">CFGM</option>
                            <option value="CFGS">CFGS</option>

                                                    
                        </select>
                    </div>

                   <a href="{{ route('listGrades') }}" class="btn btn-default pull-left">
                        {{ __("Volver atrás") }}
                    </a>
                    <button  style="margin:5% auto;display:block" type="submit" name="editGrade" class="btn btn-primary"> 
                        {{ __("Editar Ciclo") }} 
                    </button>
                </form>
            
        </div>
    </div>
</div>

@endsection