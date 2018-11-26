@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> Solicitudes - Agrupadas por Tipo </h1>
        <div class="clearfix"></div>

        

        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Numero de solicitudes para FCT") }} : {{ $PFCT->count() }} 
                @if($PFCT->count())
                <div class="col-md-1 pull-right">
                    <form action="{{ route('filterPetitions', ['type'=>'FCT', 'grade'=>$grade->id]) }}" method="POST">
                    {{csrf_field()}}
                        <button class="btn btn-primary btn-xs pull-right" type="submit">PDF</button>
                    </form>
                </div>
                @endif
            </div>
            
            
            <div class="panel-body">
                @forelse($PFCT as $petition)
                <div style="margin:2% 0" class="row">
                    <div class="col-md-10">
                        {{ __("Solicitud de la empresa") }} : 
                        <a href="../companies/{{ $petition->company->id }}">{{ $petition->company->name }}</a>
                        {{ __(" - Nº de estudiantes ") }} : {{ $petition->n_students }}
                    </div>                    
                </div>
                @empty
                    {{ __("No hay solicitudes") }}
                @endforelse
            </div>
        </div>





        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Numero de solicitudes de DUAL") }} : {{ $PDUAL->count() }} 
                @if($PDUAL->count())
                
                <div class="col-md-1 pull-right">
                    <form action="{{ route('filterPetitions', ['type'=>'DUAL', 'grade'=>$grade->id]) }}" method="POST">
                    {{csrf_field()}}
                        <button class="btn btn-primary btn-xs pull-right" type="submit">PDF</button>
                    </form>
                </div>
                @endif
            </div>
            <div class="panel-body">
                @forelse($PDUAL as $petition)
                <div style="margin:2% 0" class="row">
                    <div class="col-md-10">
                        {{ __("Solicitud de la empresa") }} : 
                        <a href="../companies/{{ $petition->company->id }}">{{ $petition->company->name }}</a>
                        {{ __(" - Nº de estudiantes ") }} : {{ $petition->n_students }}
                    </div>                    
                </div>
                @empty
                    {{ __("No hay solicitudes") }}
                @endforelse
            </div>
        </div>




        <div style="margin-top:3%" class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                {{ __("Numero de solicitudes de Empleo") }} : {{ $PEmpleo->count() }} 
                @if($PEmpleo->count())
                <div class="col-md-1 pull-right">
                    <form action="{{ route('filterPetitions', ['type'=>'Empleo', 'grade'=>$grade->id]) }}" method="POST">
                    {{csrf_field()}}
                        <button class="btn btn-primary btn-xs pull-right" type="submit">PDF</button>
                    </form>
                </div>
                @endif
            </div>
            <div class="panel-body">
                @forelse($PEmpleo as $petition)
                <div style="margin:2% 0" class="row">
                    <div class="col-md-10">
                        {{ __("Solicitud de la empresa") }} : 
                        <a href="../companies/{{ $petition->company->id }}">{{ $petition->company->name }}</a>
                        {{ __(" - Nº de estudiantes ") }} : {{ $petition->n_students }}
                    </div>                    
                </div>
                @empty
                    {{ __("No hay solicitudes") }}
                @endforelse
            </div>
        </div>

    </div>
</div>

<div style="margin-bottom:3%" class="row">
    <div class="col-md-8 col-md-offset-2">
        <a href="{{ route('listPetitions') }}" class="btn btn-default pull-left">
            {{ __("Volver") }}
        </a>
        
        
    </div>
</div>

@endsection