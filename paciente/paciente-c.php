<?php
			ob_start();
			include_once("./classes/paciente.class.php");
			
			$paciente 	= new Paciente($codigoPaciente,$nomePaciente,$sexoPaciente,$nascimentoPaciente,$responsavelPaciente,$dddResponsavel,$telefoneResponsavel);
			
			$pacientes = $paciente->listarPaciente();
		?>
<html>
	<head>
		<title>Registro de pacientes</title>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<main class="normal">
			<table class="table table-hover" id="tabelaRegistro">
				<tr><td colspan="8"><h2>Pacientes</h2></td></tr>
				<tr><th>Código</th><th>Nome</th><th>Sexo</th>
				<th>Nascimento</th><th>Responsável</th>
				<th>Telefone</th><th colspan=2>Ação</th></tr>
					
				<?php if (empty($pacientes)) { ?>
					<tr><td colspan=7>Sem registros para consultar</td></tr>
					<td align="center" colspan=7>
						<a href="./principal.php?pagina=paciente/cadastroPaciente-f.php"><input type="button" title="Voltar" value="Voltar">
					</td>
				<?php } else {
					foreach ($pacientes as $paciente) { ?>
						<tr>
							
							<td><b> <?php	echo $paciente['codigoPaciente'];	?></td>
							<td><?php		echo $paciente['nomePaciente'];	?></td>
							<td><?php		echo $paciente['sexoPaciente'];	?></td>
							<td><?php		echo date_format(date_create($paciente['nascimentoPaciente']),'d/m/Y');	?></td>
							<td><?php		echo $paciente['responsavelPaciente'];	?></td>
							<td><?php		echo $paciente['dddResponsavel'] . " " . $paciente['telefoneResponsavel']; ?></td>
							<td><a href="paciente/cadastroPaciente-p.php?acao=1&chave=<?php echo $paciente['codigoPaciente']; ?>"><img src="./images/gridalterar.bmp" title="Alterar"/></a></td>
							<td><a href="#"><img src="./images/gridexcluir.bmp" title="Excluir" data-toggle="modal" data-target="#modal-<?php echo $paciente['codigoPaciente']; ?>"/></a></td>
							<div class="modal fade" id="modal-<?php echo $paciente['codigoPaciente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content background1">
										<div class="modal-header">
											<h5 class="modal-title">Confirmar exclusão</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form name="formExcluir" method="POST" action="paciente/cadastroPaciente-p.php?acao=2&chave=<?php echo $paciente['codigoPaciente']; ?>">
												Deseja excluir o paciente <b><?php echo $paciente['nomePaciente']; ?></b>?
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
						<?php } ?>
						
						<tr>
						<td><a href="./principal.php?pagina=paciente/cadastroPaciente-f.php" title="Paciente"><img name="botaoVoltar" src="./images/voltar.png"/></a><a href="?pagina=paciente/paciente-c.php" title="Atualizar"><img name="botaoAtualizar" src="./images/atualizar.bmp"/></a></td>
				<?php } ?>
			</table>
		</main>
	</body>
</html>