@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 style="margin: 2% 0 5% 0" class="text-center text-mute"> {{ __("Empresas") }} </h1>
        <div style="height: 40px;margin: 0 0 2% 0">
            <a href="{{ route('companies.create') }}" class="btn btn-primary pull-right">Añadir empresa</a>
        </div>

        @forelse($companies as $company)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                <a href="companies/{{ $company->id }}"> {{ $company->name }} {{ $company->city }} </a>
                <!-- <form action="{route('students.destroy', $student->id)}}" method="POST">
                   {csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
                </form> -->
            </div>
        </div>

        @empty
        <div class="alert alert-danger">
            {{ __("Todvía no hay ninguna empresa registrada en el sistema") }}
        </div>
        @endforelse

        <!-- Navegación -->
        <div style="text-align:center">
            @if($companies->count())
                {{$companies->links()}}
            @endif
        </div>
        
    </div>
</div>
@endsection