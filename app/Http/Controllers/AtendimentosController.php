<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atendimento;

class AtendimentosController extends Controller
{

    public function index(Request $request)
    {
        $atendimentos = Atendimento::query()->orderBy('codigoAtendimento','desc')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        return view('atendimentos.index')->with('atendimentos', $atendimentos)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('atendimentos.create');
    }

    public function store(Request $request)
    {
        Atendimento::create($request->except(['_token']));
        return redirect('/atendimentos');
    }

    public function destroy(Request $request)
    {
        Atendimento::destroy($request->atendimento);
        $request->session()->put('mensagem.sucesso', 'Atendimento removido com sucesso.');
        return to_route('atendimentos.index');
    }
    
}
