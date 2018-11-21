@extends('layouts.app')

@section('content')

<form action="{{ route('petitions.index')}}" method="GET" class="form-inline">
    <input type="hidden" name ="id" value="{{ $grade->id }}"/>

        <div class="form-group">
            <label for="type" class="col-md-12 control-label">
                {{ __("Tipo de petición")}}
            </label>
            <select id="type" class="form-control" name="type">
                <option value="FCT">FCT</option>
                <option value="DUAL">DUAL</option>
                <option value="Empleo">Empleo</option>
            </select>
        </div>
        <input type="submit" value="Filtrar por tipo" class="btn btn-primary"/>
</form>