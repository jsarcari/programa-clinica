<?php
	ob_start();
	
	include_once ("./classes/atendimentos.class.php");
	
	$atendimento 	= new Atendimentos($codigoAtendimento,$senhaAtendimento,$guicheAtendimento,$dataAtendimento,$horaAtendimento,$codigoPaciente,$convenioAtendimento,$desdobramentoAtendimento);
?>

<html>
	<head>
		<title>Painel de atendimentos</title>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	<head>
	<body>
		<table>
			<tr>
				<td colspan=2><h2>PAINEL DE ATENDIMENTOS</h2></td>
			</tr>
			<tr>
				<td>
					<fieldset class="atendimentosSexo">
						<legend>Atendimentos - Sexo</legend>
						<table border=0 class="tabelaVisualizacao">
							<tr>
								<td>Masculino</td>
								<td>Feminino</td>
							</tr>
							<tr>
								<td>
									<h3>
									<?php $atendimento->visualizacaoAtendimento("M");?>
									</h3>
								</td>
								<td>
									<h3>
									<?php $atendimento->visualizacaoAtendimento("F");?>
									</h3>
								</td>
							</tr>
						</table>
					</fieldset>
				</td>
				<td>
					<fieldset class="totalAtendimentos">
						<legend>Total de atendimentos</legend>
						<br>
						<table border=0 class="tabelaVisualizacao">
							<tr>
								<td><h3><?php $atendimento->totalAtendimento();?></h3></td>
							</tr>
						</table>
					</fieldset>
				</td>
			</tr>
			<tr>
				<td colspan=2>Aguarde a chamada de sua senha e encaminhe-se para o guichê informado</td>
			</tr>
			<tr>
				<td>
					<fieldset class="senhaChamada">
						<legend>Senha chamada</legend>
						<br>
						<table border=0 class="tabelaVisualizacao">
							<tr>
								<td><h3><?php echo $atendimento->senhaAtendimento(1);?></h3></td>
							</tr>
						</table>
					</fieldset>
				</td>
				<td>
					<fieldset class="guiche">
						<legend>Guichê</legend>
						<br>
						<table border=0 class="tabelaVisualizacao">
							<tr>
								<td><h3><?php echo $atendimento->guicheAtendimento();?></h3></td>
							</tr>
						</table>
					</fieldset>
				</td>
			</tr>
		</table>
	</body>
</html>