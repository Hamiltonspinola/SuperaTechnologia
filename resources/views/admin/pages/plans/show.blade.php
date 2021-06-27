@extends('adminlte::page')

@section('title', 'Detalhes do Plano { $plan->name }')

@section('content_header')
    <h1>Detalhes do Plano <strong>{{ $plan->name }}</strong></h1>
    <td><a href="{{ route('admin.index') }}" class="btn btn-success"><i class="fa fa-home" aria-hidden="true"></i> Home</a></td>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $plan->name }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $plan->url }}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',','.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plan->description }}
                </li>
            </ul>
            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
            <td><a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-success"><i class="fa fa-wrench" aria-hidden="true"></i> Editar</a></td>
            </form>
        </div>
    </div>
@stop