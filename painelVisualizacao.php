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
		<main class="painel">
			<div id="ultima">
				<div id="tituloPainel">
					Painel
				</div>
				<p>Senha</p>
				<p id="dadoPainel"><?php 	$chamada = $atendimento->ultimaChamada();
							echo $chamada['senhaAtendimento']; ?></p>
				<p>Guichê</p>
				<p id="dadoPainel"><?php echo $chamada['guicheAtendimento']; ?></p>
				<div id="dataUltima">
					<i class="fas fa-calendar-alt"></i>&emsp;<?php echo date_format(date_create($chamada['dataAtendimento']),'d/m/Y'); ?>
					&emsp;<i class="far fa-clock"></i>&emsp;<?php echo date_format(date_create($chamada['horaAtendimento']),'H:i'); ?>
				</div>
			</div>
			<div id="ultimas">
				<p id="dadoPainel"><?php echo $chamada['senhaAtendimento']; ?></p>
				<p>Guichê</p>
				<p id="dadoPainel"><?php echo $chamada['guicheAtendimento']; ?></p>
				<div id="tabelaUltimas">
					<?php $chamadas = $atendimento->ultimasChamadas(); ?>
					<table class="tabelaChamadas">
						<tr style="background-color: #191814; color: #acb9bb; text-align: center;"><td colspan="2">últimas chamadas</td></tr>
						<tr style="background-color: #497b92; color: #e2f6fa; font-weight: bolder;"><td>&nbsp;Senha</td><td><?php echo $chamadas[0]['senhaAtendimento']; ?></td></tr>
						<tr style="background-color: #497b92; color: #e2f6fa; font-weight: bolder;"><td>&nbsp;Guichê</td><td><?php echo $chamadas[0]['guicheAtendimento']; ?></td></tr>
						<tr style="background-color: #618c9f; color: #e2f6fa; font-weight: bolder;"><td>&nbsp;Senha</td><td><?php echo $chamadas[1]['senhaAtendimento']; ?></td></tr>
						<tr style="background-color: #618c9f; color: #e2f6fa; font-weight: bolder;"><td>&nbsp;Guichê</td><td><?php echo $chamadas[1]['guicheAtendimento']; ?></td></tr>
						<tr style="background-color: #7a9db1; color: #e2f6fa; font-weight: bolder;"><td>&nbsp;Senha</td><td><?php echo $chamadas[2]['senhaAtendimento']; ?></td></tr>
						<tr style="background-color: #7a9db1; color: #e2f6fa; font-weight: bolder;"><td>&nbsp;Guichê</td><td><?php echo $chamadas[2]['guicheAtendimento']; ?></td></tr>
					</table>
				</div>
			</div>
		</main>
	</body>
</html>