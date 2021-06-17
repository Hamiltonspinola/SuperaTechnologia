@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo Plano</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form">
                <form action="{{ route('plans.store') }}" method="post">
                    @csrf
                    
                    <div class="form-group">
                    <label for="name">Nome: </label>
                        <input type="text" name="name" id="" class="form-control" placeholder="Nome:">
                    </div>

                    <div class="form-group">
                    <label for="name">Preço: </label>
                        <input type="text" name="price" id="" class="form-control" placeholder="Preço:">
                    </div>

                    <div class="form-group">
                    <label for="name">Descrição: </label>
                        <input type="text" name="description" id="" class="form-control" placeholder="Descrição:">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection