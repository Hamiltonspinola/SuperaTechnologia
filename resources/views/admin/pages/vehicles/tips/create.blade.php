@extends('adminlte::page')

@section('title', 'Cadastrar Novo Detalhe de Plano')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('vehicles.show', $vehicle->url) }}">{{ $vehicle->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('vehicles.tips.index', $vehicle->url) }}">Detalhes</a></li>
    </ol>
    <h1>Adicionar novo detalhe ao Plano {{ $vehicle->name }}</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form">
                <form action="{{ route('vehicles.tips.store', $vehicle->url) }}" method="post" class="form">
                    @csrf
                    
                    @include('admin.pages.vehicles.tips._partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection