@extends('base')
@section('conteudo')

    <form action="{{ route('aluno.search') }}" method="post">

        @csrf

        <label for="">Nome</label><br>
        <input type="text" name="nome"><br>

        <button type="submit">Buscar</button>
        <button><a href="{{ route('aluno.create') }}">Novo</a></button>
    </form>

    <hr>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th colspan="2">Ações</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>Editar</td>
                    <td><a href="{{ url('aluno/destroy/' . $item->id) }}"> Excluir</a></td>
                    <td><form action="{{ route('aluno.destroy',$item) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <input type="submit" value="Deletar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
