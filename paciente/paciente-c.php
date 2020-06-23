<html>
	<head>
		<title>Registro de pacientes</title>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
	<body>
		<?php
			ob_start();
			error_reporting(0);
		
			include_once("./classes/paciente.class.php");
			
			$paciente 	= new Paciente($codigoPaciente,$nomePaciente,$sexoPaciente,$nascimentoPaciente,$responsavelPaciente,$dddResponsavel,$telefoneResponsavel);
			
			$pacientes = $paciente->listarPaciente();
		?>
		<table class="table table-hover" id="tabelaRegistro">
				<tr><td colspan="8"><h2>Pacientes</h2></td></tr>
				<tr><th>Código</th><th>Nome</th><th>Sexo</th>
				<th>Nascimento</th><th>Responsável</th>
				<th>Telefone</th><th colspan=3>Ação</th></tr>
				
				<?php if (empty($pacientes)) { ?>
					<tr><td colspan=7>Sem registros para consultar</td></tr>
					<td align="center" colspan=7>
					<a href="./principal.php?pagina=paciente/cadastroPaciente-f.php"><input type="button" title="Voltar" value="Voltar">
					</td>
				<?php } else {
					foreach ($pacientes as $paciente) { ?>
						<tr>
						
						<td><b> <?php	echo $paciente['codigoPaciente'];	?></b></td>
						<td><?php		echo $paciente['nomePaciente'];	?></td>
						<td><?php		echo $paciente['sexoPaciente'];	?></td>
						<td><?php		echo date_format(date_create($paciente['nascimentoPaciente']),'d/m/Y');	?></td>
						<td><?php		echo $paciente['responsavelPaciente'];	?></td>
						<td><?php		echo $paciente['dddResponsavel'] . " " . $paciente['telefoneResponsavel']; ?></td>
						<td><a href="paciente/cadastroPaciente-p.php?acao=1&chave=<?php echo $paciente['codigoPaciente']; ?>"><img src="./images/gridalterar.bmp" title="Alterar"/></a></td>
						<td><a href="paciente/cadastroPaciente-p.php?acao=2&chave=<?php echo $paciente['codigoPaciente']; ?>"><img src="./images/gridexcluir.bmp" title="Excluir"/></a></td>
						</tr>
					<?php } ?>
					
					<tr>
					<td><a href="./principal.php?pagina=paciente/cadastroPaciente-f.php" title="Paciente"><img name="botaoVoltar" src="./images/voltar.png"/></a><a href="?pagina=paciente/paciente-c.php" title="Atualizar"><img name="botaoAtualizar" src="./images/atualizar.bmp"/></a></td>
					</table>
					</div>
				<?php } ?>
	</body>
</html>