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
				<h1 id="dadoPainel"><?php 	$chamada = $atendimento->ultimaChamada();
							echo $chamada['senhaAtendimento']; ?></h1>
				<p>Guichê</p>
				<h1 id="dadoPainel"><?php echo $chamada['guicheAtendimento']; ?></h1>
				<div id="dataUltima">
					<i class="fas fa-calendar-alt"></i>&emsp;<?php echo date_format(date_create($chamada['dataAtendimento']),'d/m/Y') ?>
					&emsp;<i class="far fa-clock"></i>&emsp;<?php echo $chamada['horaAtendimento']; ?>
				</div>
			</div>
			<div id="ultimas">
				<h1 id="dadoPainel"><?php echo $chamada['senhaAtendimento']; ?></h1>
				<p>Guichê</p>
				<h1 id="dadoPainel"><?php echo $chamada['guicheAtendimento']; ?></h1>
				<div id="tabelaUltimas">

				</div>
			</div>
		</main>
	</body>
</html>