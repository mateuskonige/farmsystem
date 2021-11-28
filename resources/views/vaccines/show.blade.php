@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h3 class="col-12 text-dark">{{ $vacina->name }}</h3>
                </div>
            </div>
            <div class="card-body">
                <p class="col-12 text-muted"> Criado {{\Carbon\Carbon::parse($vacina->created_at)->diffForHumans()}}</p>
                <p class="col-12 text-dark">{{$vacina->description}}</p>
                <form method="POST" class="col-12 fm-inline" action="{{ route('vacinas.destroy', ['vacina' => $vacina->id]) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('vacinas.edit', ['vacina' => $vacina->id]) }}" class="btn btn-success btn-sm">
                        Editar
                    </a>
                    <button type="submit" class="btn btn-danger btn-sm">
                        Excluir
                    </button>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('vacinas.index') }}" class="float-right btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
