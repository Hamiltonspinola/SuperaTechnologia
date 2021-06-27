@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.details.index', $plan->url) }}">Detalhes</a></li>
    </ol>
    <h1>Detalhes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
            @csrf
            <input type="text" name="filter" id="name" placeholder="Filtrar..." class="form-controll">
            <button type="submit" class="btn btn-dark"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
            <a href="{{ route('plans.details.create', $plan->url)}}" class="btn btn-dark" style="height: auto; margin:auto 10px;"><i class="fa fa-address-book" aria-hidden="true"></i> Cadastrar</a>
        </form>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th width=250>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            @if(isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif()
            
            
            </div>
        </div>
    </div>
@stop