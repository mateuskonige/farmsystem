@extends('layouts.app')
@section('content')
<div class="row text-center justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">Editar Vacina</div>
                <div class="card-body">
                    <form method="POST"  action="{{ route('vacinas.update', ['vacina' => $vacina->id]) }}">
                        @csrf
                        @method('PUT')
                        @include('vaccines._form')

                        <button type="submit" class="btn btn-primary btn-block">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
