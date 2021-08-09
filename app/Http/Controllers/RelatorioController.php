<?php

namespace App\Http\Controllers;

use App\{Abastecimento, Veiculo, Tipo_combustivel, Motorista};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class RelatorioController extends Controller
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
        $motoristas = Motorista::query()->orderBy('nome')->get();
        return view('relatorio.index', compact('veiculos', 'motoristas'));
    }

    public function emitir(Request $request)
    {
        $veiculo_id = $request->veiculo_id;
        $motorista_id = $request->motorista_id;
        $abastecimentos = DB::table('abastecimento')
            ->select('abastecimento.*', 'veiculo.nome  as nome_veiculo', 'motorista.nome as nome_motorista', 'tipo_combustivel.nome as nome_combustivel', 'tipo_combustivel.preco')
            ->join('veiculo', 'abastecimento.veiculo_id', '=', 'veiculo.id')
            ->join('motorista', 'abastecimento.motorista_id', '=', 'motorista.id')
            ->join('tipo_combustivel', 'abastecimento.tipo_combustivel_id', '=', 'tipo_combustivel.id')
            ->when($veiculo_id, function ($query, $veiculo_id) {
                return $query->where('abastecimento.veiculo_id', '=', $veiculo_id);
            })
            ->when($motorista_id, function ($query, $motorista_id) {
                return $query->where('abastecimento.motorista_id', '=', $motorista_id);
            })
            ->orderBy($request->ordem_por, $request->ordem)
            ->get();
        if (!empty($request->btn_pesquisar)) {
            $veiculos = Veiculo::query()->orderBy('nome')->get();
            $motoristas = Motorista::query()->orderBy('nome')->get();
            return view('relatorio.index', compact('veiculos', 'motoristas', 'abastecimentos'));
        } else {
            $pdf = PDF::loadView('relatorio.emitir', compact('abastecimentos'));
            return $pdf->setPaper('a4', 'landscape')->stream('rel_abastecimentos');
        }
    }

    public function listar(Request $request)
    {
        $veiculo_id = $request->veiculo_id;
        $motorista_id = $request->motorista_id;
        $abastecimentos = DB::table('abastecimento')
            ->select('abastecimento.*', 'veiculo.nome  as nome_veiculo', 'motorista.nome as nome_motorista', 'tipo_combustivel.nome as nome_combustivel', 'tipo_combustivel.preco')
            ->join('veiculo', 'abastecimento.veiculo_id', '=', 'veiculo.id')
            ->join('motorista', 'abastecimento.motorista_id', '=', 'motorista.id')
            ->join('tipo_combustivel', 'abastecimento.tipo_combustivel_id', '=', 'tipo_combustivel.id')
            ->when($veiculo_id, function ($query, $veiculo_id) {
                return $query->where('abastecimento.veiculo_id', '=', $veiculo_id);
            })
            ->when($motorista_id, function ($query, $motorista_id) {
                return $query->where('abastecimento.motorista_id', '=', $motorista_id);
            })
            ->orderBy($request->ordem_por, $request->ordem)
            ->get();
        
        return view('relatorio.listar', compact('abastecimentos'));
    }
}
