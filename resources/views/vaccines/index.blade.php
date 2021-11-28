@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Biblioteca de Vacinas</div>
                <div class="card-body">
                    <a href="{{ route('vacinas.create')}}" class="btn btn-primary my-2">Adicionar nova Vacina</a>
                    <table>
                        <th width="20%" class="border-bottom text-center">Nome</th>
                        <th width="50%" class="border-bottom text-center">Descrição</th>
                        <th width="30%" class="border-bottom text-center">Animal</th>
                        <th width="10%" class="border-bottom text-center">Ações</th>

                        @forelse ($vacinas as $vacina)
                        <tr>
                            <td class="border text-center"><p>{{ $vacina->name }}</p></td>
                            <td class="border text-center"><p>{{ $vacina->description }}</p></td>
                            <td class="border text-center"><p>{{ $vacina->animals->class }}</p></td>
                            <td class="border text-center">
                                <p>
                                    <form method="POST" class="fm-inline" action="{{ route('vacinas.destroy', ['vacina' => $vacina->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('vacinas.edit', ['vacina' => $vacina->id]) }}" class="btn btn-success">
                                            Editar
                                        </a>
                                        <button type="submit" class="btn btn-danger">
                                            Excluir
                                        </button>
                                    </form>
                                </p>
                            </td>
                        </tr>
                        @empty
                            <p>Nenhuma Vacina Criada ainda!</p>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
