<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacientesController extends Controller
{

    public function index()
    {
        $pacientes = Paciente::query()->orderBy('nomePaciente','asc')->get();
        return view('pacientes.index')->with('pacientes', $pacientes);
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        Paciente::create($request->all());
        return redirect('/pacientes');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return to_route('pacientes.index')->with('mensagem.sucesso', 'Paciente removido com sucesso.');
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit')->with('paciente', $paciente);
    }

}