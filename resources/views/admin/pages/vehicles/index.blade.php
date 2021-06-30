@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
    </ol>
    <h1>Veículos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <form action="{{ route('vehicles.search') }}" method="post" class="form form-inline">
            @csrf
            <input type="text" name="filter" id="name" placeholder="Filtrar..." class="form-controll">
            <button type="submit" class="btn btn-dark"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
            <a href="{{ route('vehicles.create')}}" class="btn btn-dark" style="height: auto; margin:auto 10px;"><i class="fa fa-address-book" aria-hidden="true"></i> Cadastrar</a>
        </form>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Veículos</th>
                            <th width=150>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->name }}</td>
                            <td><a href="{{ route('vehicles.show', $vehicle->url) }}" class="btn btn-dark"> Ver</a></td>
                            <td><a href="{{ route('vehicles.edit', $vehicle->url) }}" class="btn btn-success"><i class="fa fa-wrench" aria-hidden="true"></i> Editar</a></td>
                            <td><a href="{{ route('vehicles.tips.index', $vehicle->url) }}" class="btn btn-primary"> Detalhes </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            @if(isset($filters))
                {!! $vehicles->appends($filters)->links() !!}
            @else
                {!! $vehicles->links() !!}
            @endif()
            
            
            </div>
        </div>
    </div>
@stop