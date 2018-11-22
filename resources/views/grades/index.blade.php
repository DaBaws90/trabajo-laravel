@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 style="margin: 2% 0 5% 0" class="text-center text-mute"> {{ __("Ciclos de FORMACION PROFESIONAL") }} </h1>
        @forelse($grades as $grade)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                {{ __("Nombre del ciclo: ") }} : <a href="grades/{{ $grade->id }}">{{ $grade->name }}</a>
            </div>
            <div class="panel-body">
                {{ __("Curso") }} : {{ $grade->level }} 
                <a href="{{ route('deleteGrade', $grade->id) }}" class="btn btn-danger btn-xs pull-right"><i class="far fa-trash-alt"></i></a>
            </div>
        </div>
        @empty
        <div class="alert alert-danger">
            {{ __("Todvía no hay ningún ciclo registrado en el sistema") }}
        </div>
        @endforelse
        
        <!-- Navegación -->
        <div style="text-align:center">
            @if($grades->count())
                {{$grades->links()}}
            @endif
        </div>
        
        <div style="margin:0 auto">
            <h2 style="text-align:center">{{ __("Añadir Ciclo") }}</h2>
            <hr />
            
            @include('partials.errors')
            <form method="POST" action="grades"> {{ csrf_field() }}
                <div class="form-group"> 
                    <label for="name" class="col-md-12 control-label"> 
                        {{ __("Nombre") }} 
                    </label>
                    <input id="name" class="form-control" name="name" value="{{ old('name') }}" /> </div>
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
                
                <button style="margin:3% auto;display:block"  type="submit" name="addGrade" class="btn btn-default"> 
                    {{ __("Añadir Ciclo") }} 
                </button>
            </form>
        </div>
    </div>
</div>
@endsection