@extends('adminlte::page')

@section('title', 'Detalhes do Plano { $vehicle->name }')

@section('content_header')
    <h1>Detalhes do Plano <strong>{{ $vehicle->name }}</strong></h1>
    <td><a href="{{ route('admin.index') }}" class="btn btn-success"><i class="fa fa-home" aria-hidden="true"></i> Home</a></td>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $vehicle->name }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $vehicle->url }}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($vehicle->price, 2, ',','.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $vehicle->description }}
                </li>
            </ul>
            <form action="{{ route('vehicles.destroy', $vehicle->url) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
            <td><a href="{{ route('vehicles.edit', $vehicle->url) }}" class="btn btn-success"><i class="fa fa-wrench" aria-hidden="true"></i> Editar</a></td>
            </form>
        </div>
    </div>
@stop