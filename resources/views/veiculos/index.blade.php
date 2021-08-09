@extends('layouts.app')

@section('content')
@if (!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        Lista de Veículos
        <a href="/veiculo/cadastrar"><button class="btn btn-primary">Cadastrar</button></a>
    </div>

    <div class="card-body">
        <ul class="list-group">
            @foreach($veiculos as $veiculo)
            <li class="list-group-item d-flex justify-content-between align-items-center pl-2">
                <span id="nome-veeiculo-{{ $veiculo->id }}" class="col-md-6 p-0">{{ $veiculo->nome }}</span>
                <span class="d-flex justify-content-end col-md-3 p-0">
                    <a href="/veiculo/{{ $veiculo->id }}/alterar" class="btn btn-secondary btn-sm mr-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="post" action="/veiculo/{{ $veiculo->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ $veiculo->nome }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-secondary btn-sm mr-1">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                    <a href="/veiculo/{{ $veiculo->id }}/info" class="btn btn-secondary btn-sm mr-1">
                        <i class="fas fa-info"></i>
                    </a>
                </span>
            </li>

            @endforeach
        </ul>
    </div>
</div>
@endsection