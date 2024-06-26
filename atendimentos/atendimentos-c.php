<?php
	ob_start();
	include_once("./classes/atendimentos.class.php");
					
	$atendimento 	= new Atendimentos($codigoAtendimento, $senhaAtendimento, $guicheAtendimento, $dataAtendimento, $horaAtendimento, $codigoPaciente, $convenioAtendimento, $desdobramentoAtendimento);	
	$atendimentos = $atendimento->listarAtendimento();

?>
<html>
	<head>
		<title>Registro de atendimentos</title>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
	<body>
		<main class="normal">
			<table class="table table-hover" id="tabelaRegistro">
				<tr><td colspan="7"><h2><span class="registros">Atendimentos</span></h2></td></tr>
				<tr><td colspan="7"><label for="filtrar-tabela">Pesquisar:</label>
					<input type="text" name="filtro" size="30" id="filtrar-tabela" placeholder="Nome do paciente"/></td></tr>
				<tr><th>Código</th><th>Data</th>
				<th>Paciente</th><th>Convênio</th><th colspan=3>Ação</th></tr>
				
				<?php if (empty($atendimentos)) { ?>
					<tr><td colspan=9>Sem registros para consultar</td></tr>
					<td align="center" colspan=5>
					<a href="./principal.php?pagina=atendimentos/atendimentos-f.php"><input type="button" title="Voltar" value="Voltar">
					</td>
				<?php } else {
					foreach ($atendimentos as $atendimento) { ?>
						<tr class="tabelaTodos">
						
							<td><b> <?php	echo $atendimento['codigoAtendimento'];	?></td>
							<td><?php		echo date_format(date_create($atendimento['dataAtendimento']),'d/m/Y') . "  " . date_format(date_create($atendimento['horaAtendimento']),'H:i'); ?></td>
							<td class="info-nome"><?php		echo $atendimento['nomePaciente'];	?></td>
							<td><?php 		echo $atendimento['convenioAtendimento']; ?></td>
							<td><a id="gerarPDF" href="pdf/gerarPDF.php?chave=<?php echo $atendimento['codigoAtendimento']; ?>" target="_blank"><i class="fas fa-print" title="Gerar comprovante"></i></a></td>
							<td><a href="atendimentos/atendimentos-p.php?acao=1&chave=<?php echo $atendimento['codigoAtendimento']; ?>"><img src="./images/gridalterar.bmp" title="Alterar"/></a></td>
							<td><a href="#"><img src="./images/gridexcluir.bmp" title="Excluir" data-toggle="modal" data-target="#modal-<?php echo $atendimento['codigoAtendimento']; ?>"></a></td>
						<div class="modal fade" id="modal-<?php echo $atendimento['codigoAtendimento']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content background1">
									<div class="modal-header">
										<h5 class="modal-title">Confirmar exclusão</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form name="formExcluir" method="POST" action="atendimentos/atendimentos-p.php?acao=2&chave=<?php echo $atendimento['codigoAtendimento']; ?>">
											Deseja excluir o atendimento <b>#<?php echo $atendimento['codigoAtendimento']; ?></b> do paciente <b><?php echo $atendimento['nomePaciente']; ?></b>?
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
					<td><a href="./principal.php?pagina=atendimentos/atendimentos-f.php" title="Atendimento"><img name="botaoVoltar" src="./images/voltar.png"/></a><a href="?pagina=atendimentos/atendimentos-c.php" title="Atualizar">
					<img name="botaoAtualizar" src="./images/atualizar.bmp"/></a></td>
				<?php } ?>
			</table>
		</main>
		<script src="javascript/jquery.js"></script>
		<script type="text/javascript" src="javascript/filtroTabela.js"></script>
	</body>
</html>