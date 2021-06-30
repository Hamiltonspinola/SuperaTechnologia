@extends('adminlte::page')

@section('title', "Detalhes Dica { $vehicle->name }")

@section('content_header')
    <h1>Detalhes da Dica <strong>{{ $vehicle->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form">
                <form action="{{ route('vehicles.tips.destroy', [$vehicle->url, $tips->id]) }}" method="POST" class="form">
                    @csrf
                    @method('DELETE')

                   <button type="submit" class="btn btn-primary">Deletar</button>
                </form>
            </div>
        </div>
    </div>
@endsection