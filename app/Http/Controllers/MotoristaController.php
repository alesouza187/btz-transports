<?php

namespace App\Http\Controllers;

use App\{Motorista, Abastecimento};
use Illuminate\Http\Request;
use App\Http\Requests\MotoristaFromRequest;

class MotoristaController extends Controller
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
        $motoristas = Motorista::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('motoristas.index', compact('motoristas','mensagem'));
    }

    public function info(Request $request)
    {
        $motorista = Motorista::where('id', $request->id)->first();
        return view('motoristas.info', compact('motorista'));
    }

    public function cadastrar()
    {
        return view('motoristas.cadastrar');
    }

    public function salvar(MotoristaFromRequest $request)
    {
        $motorista = Motorista::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "Motorista $motorista->nome cadastrado com sucesso!"
            );
        return redirect()->route('listar_motoristas');
    }

    public function deletar(Request $request)
    {
        $abastecimentos = Abastecimento::where('motorista_id', $request->id)->get();
        foreach ($abastecimentos as $abastecimento) {
            $abastecimento->delete();
        }
        $motorista = Motorista::where('id', $request->id)->first();
        $request->session()
            ->flash(
                'mensagem',
                "Motorista $motorista->nome deletado com sucesso!"
            );
        $motorista->delete();
        return redirect()->route('listar_motoristas');
    }

    public function alterar(Request $request)
    {
        $motorista = Motorista::where('id', $request->id)->first();
        return view('motoristas.alterar', compact('motorista'));
    }

    public function salvar_alterar(MotoristaFromRequest $request)
    {
        $motorista = Motorista::where('id', $request->id)->first();
        $motorista->nome = $request->nome;
        $motorista->cpf = $request->cpf;
        $motorista->nascimento = $request->nascimento;
        $motorista->cnh = $request->cnh;
        $motorista->categoria_cnh = $request->categoria_cnh;
        $motorista->save();
        $request->session()
            ->flash(
                'mensagem',
                "Motorista $motorista->nome alterado com sucesso!"
            );
        return redirect()->route('listar_motoristas');
    }

    public function desativar_ativar(Request $request)
    {
        $motorista = Motorista::where('id', $request->id)->first();
        if ($motorista->status == 'S') {
            $motorista->status = 'N';
            $request->session()
            ->flash(
                'mensagem',
                "Motorista $motorista->nome desativado com sucesso!"
            );
        } else {
            $motorista->status = 'S';
            $request->session()
            ->flash(
                'mensagem',
                "Motorista $motorista->nome ativado com sucesso!"
            );
        }
        $motorista->save();
        return redirect()->route('listar_motoristas');
    }

}
