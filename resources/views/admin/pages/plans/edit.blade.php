@extends('adminlte::page')

@section('title', "Editar Plano { $plans->name }")

@section('content_header')
    <h1>Editar o Plano <strong>{{ $plans->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form">
                <form action="{{ route('plans.update', $plans->url) }}" method="POST" class="form">
                    @csrf
                    @method('PUT')

                   @include('admin.pages.plans._partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection