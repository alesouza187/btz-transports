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
        Lista de Motoristas
        <a href="/motorista/cadastrar"><button class="btn btn-primary">Cadastrar</button></a>
    </div>

    <div class="card-body">
        <ul class="list-group">
            @foreach($motoristas as $motorista)
            <li class="list-group-item d-flex justify-content-between align-items-center pl-2 <?= $motorista->status == 'S' ? '' : 'list-group-item-secondary' ?>">
                <span id="nome-motorista-{{ $motorista->id }}" class="col-md-6 p-0">{{ $motorista->nome }}</span>
                <span class="col-md-3">Status: <?= $motorista->status == 'S' ? 'Ativo' : 'Inativo' ?></span>
                <span class="d-flex justify-content-end col-md-3 p-0">
                    <a href="/motorista/{{ $motorista->id }}/alterar" class="btn btn-secondary btn-sm mr-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="post" action="/motorista/{{ $motorista->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ $motorista->nome }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-secondary btn-sm mr-1">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                    @if ($motorista->status == 'S')
                        <a href="/motorista/{{ $motorista->id }}/desativar_ativar" class="btn btn-secondary btn-sm mr-1">
                            <i class="fas fa-times"></i>
                        </a>
                    @else
                        <a href="/motorista/{{ $motorista->id }}/desativar_ativar" class="btn btn-secondary btn-sm mr-1">
                            <i class="fas fa-check-square"></i>
                        </a>
                    @endif
                    <a href="/motorista/{{ $motorista->id }}/info" class="btn btn-secondary btn-sm mr-1">
                        <i class="fas fa-info"></i>
                    </a>
                </span>
            </li>

            @endforeach
        </ul>
    </div>
</div>
@endsection