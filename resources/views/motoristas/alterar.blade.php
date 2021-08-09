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

<div class="card mb-3">
    <div class="card-header">Alterar Motorista</div>
    <div class="card-body">
        <form action="/motorista/{{ $motorista->id }}/alterar" method="post">
            @csrf
            <input name="status" value="S" hidden />
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $motorista->nome }}" placeholder="Digite o nome do motorista">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $motorista->cpf }}" maxlength="11" placeholder="Digite o CPF do motorista">
            </div>
            <div class="form-group">
                <label for="nascimento">Data Nascimento</label>
                <input type="date" class="form-control" id="nascimento" name="nascimento" value="{{ substr($motorista->nascimento, 0, 10) }}">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="cnh">CNH</label>
                    <input type="text" class="form-control" id="cnh" name="cnh" value="{{ $motorista->cnh }}" placeholder="Digite a CNH do motorista">
                </div>
                <div class="form-group col-md-6">
                    <label for="categoria_cnh">Categoria CNH</label>
                    <input type="text" class="form-control" id="categoria_cnh" name="categoria_cnh" value="{{ $motorista->categoria_cnh }}" maxlength="2" placeholder="Digite a categoria da CNH do motorista">
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <a href="/motorista" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-success">Alterar</button>
            </div>
        </form>
    </div>
</div>
@endsection