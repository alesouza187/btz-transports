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
        Cadastrar Abastecimentos
    </div>
    <div class="card-body">
        <form action="/abastecimento/salvar" method="post">
            @csrf
            <input hidden id="valor_total" name="valor_total" value="0.00">
            <div class="form-group">
                <label for="motorista_id">Motorista Responsável</label>
                <select class="form-control" id="motorista_id" name="motorista_id">
                    <option value="">Selecione</option>
                    @foreach ($motoristas as $motorista)
                        @if ($motorista->status == 'S')
                            <option value="{{ $motorista->id }}" <?= old('motorista_id') == '' ? '' : 'selected' ?> >{{ $motorista->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="veiculo_id">Veículo</label>
                <select class="form-control" id="veiculo_id" name="veiculo_id">
                    <option value="">Selecione</option>
                    @foreach ($veiculos as $veiculo)
                        <option value="{{ $veiculo->id }}" <?= old('veiculo_id') == '' ? '' : 'selected' ?>>{{ $veiculo->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_combustivel_id">Tipo de Combustível</label>
                <select class="form-control" id="tipo_combustivel_id" name="tipo_combustivel_id">
                    <option value="">Selecione</option>
                    @foreach ($tipo_combustivels as $tipo_combustivel)
                        <option value="{{ $tipo_combustivel->id }}" <?= old('tipo_combustivel_id') == '' ? '' : 'selected' ?>>{{ $tipo_combustivel->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="abastecimento">Data do Abastecimento</label>
                    <input type="date" class="form-control" id="abastecimento" name="abastecimento" value="{{ old('abastecimento') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="quantidade">Quantidade abastecida</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" max="999" value="{{ old('quantidade') }}" placeholder="Digite a quantidade abastecida">
                    <div id="quantidade" class="form-text">Litros</div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <a href="/" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection