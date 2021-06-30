@extends('adminlte::page')

@section('title', "Editar Dica { $vehicle->name }")

@section('content_header')
    <h1>Editar Dica <strong>{{ $vehicle->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form">
                <form action="{{ route('vehicles.tips.update', [$vehicle->url, $tips->id]) }}" method="POST" class="form">
                    @csrf
                    @method('PUT')

                   @include('admin.pages.vehicles.tips._partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection