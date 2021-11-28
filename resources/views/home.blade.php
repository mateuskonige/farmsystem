@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5><strong>Gestão de Vacinas</strong></h5></div>
                <div class="card-body">
                    <a href="{{ route('vacinas.index')}}" class="btn btn-success btn-lg btn-block">Biblioteca de Vacinas</a><br>
                    <a href="{{ route('vacinas.create') }}" class="btn btn-primary btn-lg btn-block">Adicionar Nova Vacina</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
