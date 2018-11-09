@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-muted"> {{ __("Detalles del estudiante :name", ['name' => $student->name]) }} </h1>
        <a href="/escuelaempresa/public/students" class="btn btn-info pull-right">
            {{ __("Volver al listado de estudiantes") }}
        </a>
        <div class="clearfix"></div>
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-post">
                <a href="../students/{{ $student->id }}"> {{ $student->name }} </a>
                <p class="pull-right">
                    {{ __("Nombre") }} : {{ $student->name }}
                </p>
            </div>
            <div class="panel-body">
                {{ $student->age }}
            </div>
        </div>
        <!--@auth
            @include('partials.errors')
            <form method="POST" action="{{route('newStudent')}}" style="margin-bottom: 45px"> {{ csrf_field() }} 
                <input type="hidden" name="forum_id" value="{{ $student->id }}"/>
                <div class="form-group"> 
                    <label for="title" class="col-md-12 control-label">{{ __("Título") }}</label> 
                    <input id="title" class="form-control" name="title" value="{{ old('title') }}"/> 
                </div>
            <div class="form-group"> 
                <label for="description" class="col-md-12 control-label">{{ __("Descripción") }}</label> 
                <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea> 
            </div>
            <button type="submit" name="addPost" class="btn btn-default">{{ __("Añadir post") }}</button> </form>-->
        
        @auth
        <a href="/escuelaempresa/public/students" class="btn btn-info pull-right">
            {{ __("Volver al listado de estudiantes") }}
        </a>
        @else
        @include("partials.login_link", ["message" => __("Inicia sesión para visualizar el registro")])
        <!-- Añadir ruta al array para redireccionar una vez hecho login -->
        @endauth
    </div>
</div>
@endsection