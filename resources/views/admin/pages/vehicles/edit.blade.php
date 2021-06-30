@extends('adminlte::page')

@section('title', "Editar Plano { $vehicles->name }")

@section('content_header')
    <h1>Editar o Plano <strong>{{ $vehicles->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form">
                <form action="{{ route('vehicles.update', $vehicles->url) }}" method="POST" class="form">
                    @csrf
                    @method('PUT')

                   @include('admin.pages.vehicles._partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection