<x-layout title="Editar paciente">
    <x-pacientes.form :action="route('pacientes.update', $paciente->codigoPaciente)"
    :nomePaciente="$paciente->nomePaciente"
    />
</x-layout>