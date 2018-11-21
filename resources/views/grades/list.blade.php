@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="text-muted text-center">{{ __("Listado de peticiones de tipo ':type' para el ciclo ':grade'", 
                ['type'=>$results[0]->type, 'grade'=>$results[0]->grade->name]) }}</h3>
            <div class="col-md-6 col-md-offset-3" style="margin-top:3%">
                <table class="table table-dark">
                    <thead>
                        <tr scope="row">
                            {{-- <th scope="col">Ciclo</th> --}}
                            <th scope="col">Empresa</th>
                            <th scope="col">Nº estudiantes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $r)
                        <tr scope="row">
                            {{-- <td>{{ $r->grade->name }}</td> --}}
                            <td>{{ $r->company->name }}</td>
                            <td>{{ $r->n_students }}</td>
                        </tr>
                    </tbody>
                    @empty
                        <tr scope="row">
                            <td>{{ __("No hay registros") }}</td>
                        </tr>
                    @endforelse
                </table>
                {{-- <button class="btn btn-block btn-primary">Generar PDF</button> --}}
            </div>

        </div>
    </div>
@endsection