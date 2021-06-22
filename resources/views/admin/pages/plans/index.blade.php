@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    </ol>
    <h1>Planos <a href="{{ route('plans.create')}}" class="btn btn-dark"><i class="fa fa-address-book" aria-hidden="true"></i> Cadastrar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
            @csrf
            <input type="text" name="filter" id="name" placeholder="Filtrar..." class="form-controll">
            <button type="submit" class="btn btn-dark"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
        </form>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th width=120>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>R$ {{ $plan->price }}</td>
                            <td><a href="{{ route('plans.show', $plan->url) }}" class="btn btn-dark"> Ver</a></td>
                            <td><a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-success"><i class="fa fa-wrench" aria-hidden="true"></i> Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            @if(isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif()
            
            
            </div>
        </div>
    </div>
@stop