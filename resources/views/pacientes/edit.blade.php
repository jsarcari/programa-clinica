<x-layout title="Editar paciente">
    <x-pacientes.form :action="route('pacientes.update', $paciente->codigopaciente)"
    :nomepaciente="$paciente->nomepaciente"
    :nascimentopaciente="$paciente->nascimentopaciente"
    :sexopaciente="$paciente->sexopaciente"
    :update="true"
    />
</x-layout>