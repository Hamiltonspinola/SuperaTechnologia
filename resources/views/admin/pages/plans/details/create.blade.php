@extends('adminlte::page')

@section('title', 'Cadastrar Novo Detalhe de Plano')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.details.index', $plan->url) }}">Detalhes</a></li>
    </ol>
    <h1>Adicionar novo detalhe ao Plano {{ $plan->name }}</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form">
                <form action="{{ route('plans.details.store', $plan->url) }}" method="post" class="form">
                    @csrf
                    
                    @include('admin.pages.plans.details._partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection