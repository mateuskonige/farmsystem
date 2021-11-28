@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Biblioteca de Vacinas</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('vacinas.store') }}">
                        @csrf
                        @include('vaccines._form')

                        <div class="form-group">
                            <label for="animals_id">Classe do animal</label>
                            <select name="animals_id" class="form-control">
                                @foreach ($animals as $animal)
                                    <option value="{{ $animal->id }}">{{ $animal->id }} - {{$animal->class}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Criar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
