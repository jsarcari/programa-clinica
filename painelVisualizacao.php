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
	<body style="background-color=#004869">
		<!--<div class="painel">
		<table>
			<tr>
				<td colspan=2><h2>Painel de atendimentos</h2></td>
			</tr>
			<tr>
				<td>
					<fieldset class="atendimentosSexo">
						<legend id="legendaPainel">Atendimentos - Sexo</legend>
								Masculino Feminino
									<h3>
									</h3>
									<h3>
									</h3>
					</fieldset>
				</td>
				<td>
					<fieldset class="totalAtendimentos">
						<legend id="legendaPainel">Total de atendimentos</legend>
						<br>
						<table border=0 class="tabelaVisualizacao">
							<tr>
								<td><h3>
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
						<legend id="legendaPainel">Última senha chamada</legend>
						<br>
						<table border=0 class="tabelaVisualizacao">
							<tr>
								<td><h3>
							</tr>
						</table>
					</fieldset>
				</td>
				<td>
					<fieldset class="guiche">
						<legend id="legendaPainel">Guichê</legend>
						<br>
						<table border=0 class="tabelaVisualizacao">
							<tr>
								<td><h3>
							</tr>
						</table>
					</fieldset>
				</td>
			</tr>
		</table>
		</div-->
		<p>Senha</p>
		<h5><?php 	$chamada = $atendimento->ultimaChamada();
					echo $chamada['senhaAtendimento']; ?></h5>
		<p>Guichê</p>
		<h5><?php echo $chamada['guicheAtendimento']; ?></h5>
	</body>
</html>