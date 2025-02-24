<x-layout title="Registro de pacientes">
    <table class="table table-hover" id="tabelaRegistro">
				<tr><td colspan="8"><h2>Pacientes</h2></td></tr>
				<tr><td colspan="6"><label for="filtrar-tabela">Pesquisar:</label>
					<input type="text" name="filtro" size="30" id="filtrar-tabela" placeholder="Nome do paciente"/></td></tr>
				<tr><th>Código</th><th>Nome</th><th>Sexo</th>
				<th>Nascimento</th><th>Responsável</th>
				<th>Telefone</th><th colspan=2>Ação</th></tr>
					
				@if (empty($pacientes))
					<tr><td colspan=7>Sem registros para consultar</td></tr>
					<td align="center" colspan=7>
						<a href="pacientes/cadastrar"><input type="button" title="Voltar" value="Voltar">
					</td>
				@else
					@foreach ($pacientes as $paciente)
						<tr class="tabelaTodos">
							
							<td><b> {{ $paciente->codigoPaciente }}</td>
							<td class="info-nome">{{ $paciente->nomePaciente }}</td>
							<td>{{ $paciente->sexoPaciente }}</td>
							<td>{{ date_format(date_create($paciente->nascimentoPaciente),'d/m/Y') }}</td>
							<td>{{ $paciente->responsavelPaciente	}}</td>
							<td>{{ $paciente->dddResponsavel }} {{ $paciente->telefoneResponsavel }}</td>
							<td><a href="{{ route('pacientes.edit', $paciente->codigoPaciente) }}"><img src="./images/gridalterar.bmp" title="Alterar"/></a></td>
							<td><a href="#"><img src="./images/gridexcluir.bmp" title="Excluir" data-toggle="modal" data-target="#modal-{{$paciente->codigoPaciente}}"/></a></td>
							<div class="modal fade" id="modal-{{$paciente->codigoPaciente}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content background1">
										<div class="modal-header">
											<h5 class="modal-title">Confirmar exclusão</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form name="formExcluir" method="POST" action="{{ route('pacientes.destroy', $paciente->codigoPaciente) }}">
												@csrf
												@method('DELETE')
												Deseja excluir o paciente <b>{{ $paciente->nomePaciente }}</b>?
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Excluir</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
										</div>
										</form>
									</div>
								</div>
							</div>
						</tr>
					@endforeach
						
					<tr>
					<td><a href="/pacientes/cadastrar" title="Paciente"><img name="botaoVoltar" src="./images/voltar.png"/></a><a href="/pacientes" title="Atualizar"><img name="botaoAtualizar" src="./images/atualizar.bmp"/></a></td>
				@endif
	</table>
</x-layout>