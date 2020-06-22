<html>
	<head>
		<title>Registro de atendimentos</title>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
	<body>
		<?php
			ob_start();
			include_once("./classes/atendimentos.class.php");
					
			$atendimento 	= new Atendimentos($codigoAtendimento, $senhaAtendimento, $guicheAtendimento, $dataAtendimento, $horaAtendimento, $codigoPaciente, $convenioAtendimento, $desdobramentoAtendimento);		
			
			$atendimentos = $atendimento->listarAtendimento();
		?>

		<table class="tabelaRegistro" border=1>
				<tr><td colspan="6"><h2>Atendimentos</h2></td></tr>
				
				<tr><th>Código</th><th>Data do atendimento</th>
				<th>Paciente</th><th>Convênio</th><th colspan=2>Ação</th></tr>
				
				<?php if (empty($atendimentos)) { ?>
					<tr><td colspan=9>Sem registros para consultar</td></tr>
					<td align="center" colspan=5>
					<a href="./principal.php?pagina=atendimentos/atendimentos-f.php"><input type="button" title="Voltar" value="Voltar">
					</td>
				<?php } else {
					foreach ($atendimentos as $atendimento) { ?>
						<tr>
						
							<td><b> <?php	echo $atendimento['codigoAtendimento'];	?></td>
							<td><?php		echo date_format(date_create($atendimento['dataAtendimento']),'d/m/Y') . "  " . 	$atendimento['horaAtendimento']; ?></td>
							<td><?php		echo $atendimento['nomePaciente'];	?></td>
							<td><?php 		echo $atendimento['convenioAtendimento']; ?></td>
							<td><a href="atendimentos/atendimentos-p.php?acao=1&chave=<?php echo $atendimento['codigoAtendimento']; ?>"><img src="./imagens/gridalterar.bmp" title="Alterar"/></a></td>
							<td><a href="atendimentos/atendimentos-p.php?acao=2&chave=<?php echo $atendimento['codigoAtendimento']; ?>"><img src="./imagens/gridexcluir.bmp" title="Excluir"/></a></td>
						</tr>
					<?php } ?>
					
					<tr>
					<td><a href="./principal.php?pagina=atendimentos/atendimentos-f.php" title="Atendimento"><img name="botaoVoltar" src="./imagens/voltar.png"/></a><a href="?pagina=atendimentos/atendimentos-c.php" title="Atualizar">
					<img name="botaoAtualizar" src="./imagens/atualizar.bmp"/></a></td>
					</table>
					</div>
				<?php } ?>
	</body>
</html>