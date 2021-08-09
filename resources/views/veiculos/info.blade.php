@extends('layouts.app')

@section('content')
<div class="card mb-3">
    <div class="card-header">Info</div>
    <div class="card-body">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $veiculo->nome }}" disabled>
        </div>
        <div class="form-group">
            <label for="tipo_combustivel_id">Tipo de Combustível</label>
            <select class="form-control" id="tipo_combustivel_id" name="tipo_combustivel_id" disabled>
                @foreach ($tipo_combustivels as $tipo_combustivel)
                    @if ($tipo_combustivel->id == $veiculo->tipo_combustivel_id)
                        <option value="{{ $tipo_combustivel->id }}">{{ $tipo_combustivel->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" id="placa" name="placa" maxlength="" value="{{ $veiculo->placa }}" disabled>
        </div>
        <div class="form-group">
            <label for="nome_fabricante">Nome Fabricante</label>
            <input type="text" class="form-control" id="nome_fabricante" name="nome_fabricante" value="{{ $veiculo->nome_fabricante }}" disabled>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="ano_fabricacao">Ano de Fabricação</label>
                <input type="number" class="form-control" id="ano_fabricacao" name="ano_fabricacao" value="{{ $veiculo->ano_fabricacao }}" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="capacidade_tanque">Capacidade do Tanque</label>
                <input type="number" class="form-control" id="capacidade_tanque" name="capacidade_tanque" max="99" value="{{ $veiculo->capacidade_tanque }}" disabled>
                <div id="capacidade_tanque" class="form-text">Litros</div>
            </div>
        </div>
        <div class="form-group">
            <label for="observavao">Observações</label>
            <textarea id="observavao" name="observavao" class="form-control" disabled>{{ $veiculo->observavao }}</textarea>
        </div>
        <a href="/veiculo" class="btn btn-primary">Voltar</a>
    </div>
</div>
@endsection