<x-layout title="Cadastro de pacientes">
    <x-pacientes.form :action="route('pacientes.store')" :nomepaciente="old('nomepaciente')" :update="false"/>
</x-layout>