<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Http\Requests\PacientesFormRequest;

class PacientesController extends Controller
{

    public function index()
    {
        $pacientes = Paciente::query()->orderBy('nomepaciente','asc')->get();
        return view('pacientes.index')->with('pacientes', $pacientes);
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(PacientesFormRequest $request)
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

    public function update(Paciente $paciente, PacientesFormRequest $request)
    {
        $paciente->fill($request->all());
        $paciente->save();

        return to_route('pacientes.index')->with('mensagem.sucesso'. 'Paciente atualizado com sucesso.');
    }

}