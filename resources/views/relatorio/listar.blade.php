@extends('layouts.app')

@section('content')

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

@endsection