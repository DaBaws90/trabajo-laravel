@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div style="margin-top:6%" class="pull-right">
            <form action="{{ route('overallList') }}" method="POST">
            {{csrf_field()}}
                <button class="btn btn-primary pull-right" type="submit">PDF - Tipos</button>
            </form>
        </div>
        <h1 style="margin:2% 0 5% 8%" class="text-center text-mute"> {{ __("Ciclos de Formacion Profesional") }} </h1>
        @forelse($grades as $grade)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                {{ __("Nombre del ciclo: ") }} : <a href="grades/{{ $grade->id }}">{{ $grade->name }}</a>
            </div>
            <div class="panel-body">
                {{ __("Curso") }} : {{ $grade->level }}
                @if($grade->petitions->count() == 0 && $grade->studies->count() == 0)
                <div class="row">
                    <div class="col-md-6">
                        {{ __("No hay peticiones ni alumnos vinculados. ¿Desea eliminar el ciclo?")}}
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('deleteGrade', $grade->id) }}" method="POST">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button onclick="return confirm('Estás seguro?')" class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                {{-- <a href="{{ route('deleteGrade', $grade->id) }}" class="btn btn-danger btn-xs pull-right"><i class="far fa-trash-alt"></i></a> --}}
                @endif
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
                
                <button style="margin:3% auto;display:block"  type="submit" name="addGrade" class="btn btn-primary"> 
                    {{ __("Añadir Ciclo") }} 
                </button>
            </form>
        </div>
    </div>
</div>
@endsection