<?php

namespace App\Http\Controllers;

use App\{Veiculo, Tipo_combustivel};
use Illuminate\Http\Request;
use App\Http\Requests\VeiculoFromRequest;

class VeiculoController extends Controller
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
        $veiculos = Veiculo::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('veiculos.index', compact('veiculos', 'mensagem'));
    }

    public function cadastrar()
    {
        $tipo_combustivels = Tipo_combustivel::query()->orderBy('nome')->get();
        return view('veiculos.cadastrar', compact('tipo_combustivels'));
    }

    public function salvar(VeiculoFromRequest $request)
    {
        $veiculo = Veiculo::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Veículo $veiculo->nome cadastrado com sucesso!"
            );
        return redirect()->route('listar_veiculos');
    }

    public function info(Request $request)
    {
        $veiculo = Veiculo::where('id', $request->id)->first();
        $tipo_combustivels = Tipo_combustivel::query()->orderBy('nome')->get();
        return view('veiculos.info', compact('veiculo', 'tipo_combustivels'));
    }

    public function deletar(Request $request)
    {
        $veiculo = Veiculo::where('id', $request->id)->first();
        $request->session()
            ->flash(
                'mensagem',
                "Veículo $veiculo->nome deletado com sucesso!"
            );
        $veiculo->delete();
        return redirect()->route('listar_veiculos');
    }

    public function alterar(Request $request)
    {
        $veiculo = Veiculo::where('id', $request->id)->first();
        $tipo_combustivels = Tipo_combustivel::query()->orderBy('nome')->get();
        return view('veiculos.alterar', compact('veiculo', 'tipo_combustivels'));
    }

    public function salvar_alterar(VeiculoFromRequest $request)
    {
        $veiculo = Veiculo::where('id', $request->id)->first();
        $veiculo->nome = $request->nome;
        $veiculo->tipo_combustivel_id = $request->tipo_combustivel_id;
        $veiculo->placa = $request->placa;
        $veiculo->nome_fabricante = $request->nome_fabricante;
        $veiculo->ano_fabricacao = $request->ano_fabricacao;
        $veiculo->capacidade_tanque = $request->capacidade_tanque;
        $veiculo->observavao = $request->observavao;
        $veiculo->save();
        $request->session()
            ->flash(
                'mensagem',
                "Veículo $veiculo->nome alterado com sucesso!"
            );
        return redirect()->route('listar_veiculos');
    }
}
