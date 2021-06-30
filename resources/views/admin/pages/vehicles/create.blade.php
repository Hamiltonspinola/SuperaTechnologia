@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo Plano</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form">
                <form action="{{ route('vehicles.store') }}" method="post" class="form">
                    @csrf
                    
                    @include('admin.pages.vehicles._partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection