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
    <div class="card-header">
        Pesquisar Abastecimentos
    </div>

    <div class="card-body">
        <form action="/relatorio/emitir" method="post">
            @csrf
            <div class="form-group">
                <label for="motorista_id">Motorista Responsável</label>
                <select class="form-control" id="motorista_id" name="motorista_id">
                    <option value="">Selecione</option>
                    @foreach ($motoristas as $motorista)
                    @if ($motorista->status == 'S')
                    <option value="{{ $motorista->id }}">{{ $motorista->nome }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="veiculo_id">Veículo</label>
                <select class="form-control" id="veiculo_id" name="veiculo_id">
                    <option value="">Selecione</option>
                    @foreach ($veiculos as $veiculo)
                    <option value="{{ $veiculo->id }}">{{ $veiculo->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="ordem_por">Ordenar Por</label>
                    <select class="form-control" id="ordem_por" name="ordem_por">
                        <option value="abastecimento">Data de Abastecimento</option>
                        <option value="valor_total">Valor Total</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="ordem">Ordem</label>
                    <select class="form-control" id="ordem" name="ordem">
                        <option value="DESC">Decrescente</option>
                        <option value="ASC">Crescente</option>
                    </select>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <button type="submit" formtarget="_blank" class="btn btn-success mr-3">Emitir Relatório</button>
                <button type="submit" name="btn_pesquisar" value="true" class="btn btn-success">Pesquisar</button>
            </div>
        </form>
    </div>
</div>

@if (isset($abastecimentos))
<div class="card">
    <div class="card-header">
        Lista de Abastecimentos
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Veículo</th>
                    <th scope="col">Motorista</th>
                    <th scope="col">Combustível</th>
                    <th scope="col">Data Abastecimento</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abastecimentos as $abastecimento)
                <tr>
                    <td>{{ $abastecimento->nome_veiculo }}</td>
                    <td>{{ $abastecimento->nome_motorista }}</td>
                    <td>{{ $abastecimento->nome_combustivel }}<br><small>R$ {{ str_replace(".",",", $abastecimento->preco) }}</small></td>
                    <td>{{ date('d/m/Y', strtotime($abastecimento->abastecimento)) }}</td>
                    <td>{{ number_format($abastecimento->quantidade, 0) }} Litros</td>
                    <td>R$ {{ str_replace(".",",", $abastecimento->valor_total) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection