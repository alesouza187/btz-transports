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
    <div class="card-header">Alterar Veículo</div>
    <div class="card-body">
        <form action="/veiculo/{{ $veiculo->id }}/alterar" method="post">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $veiculo->nome }}" placeholder="Digite o nome do veículo">
            </div>
            <div class="form-group">
                <label for="tipo_combustivel_id">Tipo de Combustível</label>
                <select class="form-control" id="tipo_combustivel_id" name="tipo_combustivel_id">
                    @foreach ($tipo_combustivels as $tipo_combustivel)
                        <option value="{{ $tipo_combustivel->id }}" <?= $tipo_combustivel->id == $veiculo->tipo_combustivel_id ? 'selected' : '' ?>>{{ $tipo_combustivel->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" maxlength="" value="{{ $veiculo->placa }}" placeholder="Digite a placa do veículo">
            </div>
            <div class="form-group">
                <label for="nome_fabricante">Nome Fabricante</label>
                <input type="text" class="form-control" id="nome_fabricante" name="nome_fabricante" value="{{ $veiculo->nome_fabricante }}" placeholder="Digite o nome do frabicante">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="ano_fabricacao">Ano de Fabricação</label>
                    <input type="number" class="form-control" id="ano_fabricacao" name="ano_fabricacao" value="{{ $veiculo->ano_fabricacao }}" placeholder="Digite o ano de frabicação do veículo">
                </div>
                <div class="form-group col-md-6">
                    <label for="capacidade_tanque">Capacidade do Tanque</label>
                    <input type="number" class="form-control" id="capacidade_tanque" name="capacidade_tanque" max="99" value="{{ $veiculo->capacidade_tanque }}" placeholder="Digite a capacidade do tanque">
                    <div id="capacidade_tanque" class="form-text">Litros</div>
                </div>
            </div>
            <div class="form-group">
                <label for="observavao">Observações</label>
                <textarea id="observavao" name="observavao" class="form-control">{{ $veiculo->observavao }}</textarea>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <a href="/veiculo" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-success">Alterar</button>
            </div>
        </form>
    </div>
</div>
@endsection