@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 style="margin: 2% 0 5% 0" class="text-center text-mute"> {{ __("Estudiantes") }} </h1>
        <div>
            <a style="margin: 0 0 3% 0" href="{{ action('StudentController@create') }}" class="btn btn-primary">Añadir estudiante</a>
        </div>
        @forelse($students as $student)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-forum">
                <a href="students/{{ $student->id }}"> {{ $student->name }} {{ $student->lastname }} </a>
                <form action="{{action('StudentController@destroy', $student->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs pull-right" type="submit"><i class="far fa-trash-alt"></i></button>
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
        
    </div>
</div>
@endsection