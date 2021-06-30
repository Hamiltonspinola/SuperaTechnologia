@extends('adminlte::page')

@section('title', "Dicas do Veículo")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('vehicles.show', $vehicle->url) }}">{{ $vehicle->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('vehicles.tips.index', $vehicle->url) }}">Detalhes</a></li>
    </ol>
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <form action="{{ route('vehicles.tips.search', $vehicle->url) }}" method="post" class="form form-inline">
            @csrf
            <input type="text" name="filter" id="name" placeholder="Filtrar..." class="form-controll">
            <button type="submit" class="btn btn-dark"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
            <a href="{{ route('vehicles.tips.create', $vehicle->url)}}" class="btn btn-dark" style="height: auto; margin:auto 10px;"><i class="fa fa-address-book" aria-hidden="true"></i> Cadastrar</a>
        </form>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Versão</th>
                            <th width=150>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tips as $tip)
                        <tr>
                            <td>{{ $tip->marca }}</td>
                            <td>{{ $tip->modelo }}</td>
                            <td>{{ $tip->versao }}</td>
                            <td><a href="{{ route('vehicles.show', $vehicle->url) }}" class="btn btn-dark"> Veículos</a>
                            <a href="{{ route('vehicles.tips.edit', [$vehicle->url, $tip->id]) }}" class="btn btn-primary"><i class="fa fa-wrench" aria-hidden="true"></i> Editar</a>
                            <a href="{{ route('vehicles.tips.show', [$vehicle->url, $tip->id]) }}" class="btn btn-warning"><i class="fa fa-wrench" aria-hidden="true"></i> Ver</a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            @if(isset($filters))
                {!! $tips->appends($filters)->links() !!}
            @else
                {!! $tips->links() !!}
            @endif()
            
            
            </div>
        </div>
    </div>
@stop