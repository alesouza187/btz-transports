<?php

namespace App\Http\Controllers;

use App\{Abastecimento, Veiculo, Tipo_combustivel, Motorista};
use Illuminate\Http\Request;
use App\Http\Requests\AbastecimentoFromRequest;

class AbastecimentoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $veiculos = Veiculo::query()->orderBy('nome')->get();
        $motoristas = Motorista::query()->orderBy('nome')->get();
        $tipo_combustivels = Tipo_combustivel::query()->orderBy('nome')->get();
        return view('abastecimento.index', compact('tipo_combustivels', 'veiculos', 'motoristas', 'mensagem'));
    }

    public function salvar(AbastecimentoFromRequest $request)
    {
        $veiculo = Veiculo::where('id', $request->veiculo_id)->first();
        $tipo_combustivels = Tipo_combustivel::query()->orderBy('nome')->get();
        // RN1
        if ($request->quantidade > $veiculo->capacidade_tanque) {
            return back()->withErrors("Quantidade abastecida excede a capacidade do tanque ($veiculo->capacidade_tanque Litros)")->withInput();
        }
        // RN2
        if ($request->tipo_combustivel_id != $veiculo->tipo_combustivel_id) {
            return back()->withErrors("Tipo de combustível não pode ser usado pelo veículo $veiculo->nome")->withInput();
        }
        // RN3
        $tmp_preco = 0.00;
        foreach ($tipo_combustivels as $tipo_combustivel) {
            if ($request->tipo_combustivel_id == $tipo_combustivel->id) {
                $tmp_preco = $request->quantidade * $tipo_combustivel->preco;
            }
        }
        $request->valor_total = number_format($tmp_preco, 2);
        Abastecimento::updateOrInsert(
            [
                'veiculo_id' => $request->veiculo_id, 
                'motorista_id' => $request->motorista_id,
                'tipo_combustivel_id' => $request->tipo_combustivel_id,
                'abastecimento' => $request->abastecimento,
                'quantidade' => $request->quantidade,
                'valor_total' => $request->valor_total
            ]
        );
        $request->session()
            ->flash(
                'mensagem',
                "Abastecimento cadastrado com sucesso!"
            );
        return redirect()->route('cadastrar_abastecimento');
    }
}
