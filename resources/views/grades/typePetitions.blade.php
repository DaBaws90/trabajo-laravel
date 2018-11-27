@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <h2 style="margin: 3% 0" class="text-muted text-center">{{ __("Listado de peticiones por tipo") }}</h2>
        <div class="col-md-6 col-md-offset-3" style="margin-top:3%">
            @forelse($results as $r)
                <h3 style="margin: 3% 0" class="text-muted text-center">{{ __("Listado para el ciclo ':name'", ['name' => $r->name]) }}</h3>

                <h4 style="margin: 3% 0"  class="text-muted text-center">{{ __("Tipo FCT") }}</h4>

                <table class="table table-dark">
                    <thead>
                        <tr scope="row">
                            <th scope="col">Empresa</th>
                            <th scope="col">Nº estudiantes</th>
                            <th scope="col">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($r->petitions as $p)
                        @if($p->type == "FCT")
                        <tr scope="row">
                            <td>{{ $p->company->name }}</td>
                            <td>{{ $p->n_students }}</td>
                            <td>{{ $p->type }}</td>
                        </tr>
                        @endif
                        @empty
                        <tr scope="row">
                            <td></td>
                            <td class="text-muted; text-center">{{ __("No hay registros") }}</td>
                            <td></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <h4 style="margin: 3% 0"  class="text-muted text-center">{{ __("Tipo DUAL") }}</h4>

                <table class="table table-dark">
                    <thead>
                        <tr scope="row">
                            <th scope="col">Empresa</th>
                            <th scope="col">Nº estudiantes</th>
                            <th scope="col">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($r->petitions as $p)
                        {{-- @if($p->type == "DUAL" && $p->type["DUAL"]->count()) --}}
                        @if($p->type == "DUAL")
                        <tr scope="row">
                            <td>{{ $p->company->name }}</td>
                            <td>{{ $p->n_students }}</td>
                            <td>{{ $p->type }}</td>
                        </tr>
                        @endif
                        @empty
                        <tr scope="row">
                            <td></td>
                            <td class="text-muted; text-center">{{ __("No hay registros") }}</td>
                            <td></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <h4 style="margin: 3% 0" class="text-muted text-center">{{ __("Tipo Empleo") }}</h4>

                <table class="table table-dark">
                    <thead>
                        <tr scope="row">
                            <th scope="col">Empresa</th>
                            <th scope="col">Nº estudiantes</th>
                            <th scope="col">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($r->petitions as $p)
                        {{-- @forelse($p->type == "Empleo") --}}
                        @if($p->type == "Empleo")
                        <tr scope="row">
                            <td>{{ $p->company->name }}</td>
                            <td>{{ $p->n_students }}</td>
                            <td>{{ $p->type }}</td>
                        </tr>
                        @endif
                        @empty
                        <tr scope="row">
                            <td></td>
                            <td class="text-muted; text-center">{{ __("No hay registros") }}</td>
                            <td></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            @empty
                
            @endforelse
        </div>

    </div>
</div>



@endsection