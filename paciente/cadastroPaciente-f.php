<?php
	ob_start();
	//error_reporting(0);
	
	include_once 'validasessao.php';

	include_once ("./classes/paciente.class.php");
	
	$paciente 	= new Paciente($codigoPaciente,$nomePaciente,$sexoPaciente,$nascimentoPaciente,$responsavelPaciente,$dddResponsavel,$telefoneResponsavel);
?>

<html lang="pt-br">
	<head>
		<meta name="decription" content="formularios em HTML">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Cadastro de pacientes</title>
		<link rel="stylesheet" type="text/css" href="./estilo.css"/>
	
		<script type="text/javascript" src="javascript/validacaoPaciente.js"></script>
		<script type="text/javascript" src="javascript/mascaraData.js"></script>
		<script type="text/javascript" src="javascript/somenteNumero.js"></script> 
	</head>
	<body>
		<main class="normal">
			<div class="formulario">
				<form name="form" method="POST" action="paciente/cadastroPaciente-p.php?acao=0" onsubmit="return validar();">
					<table>
							<tr>
								<td colspan=4><h2>Cadastro de pacientes</h2></td>
							</tr>
							<tr>
								<td colspan=3>Campos com * são de preenchimento obrigatório.</td>
								<td class="sex"><label for="sexoPaciente">  Sexo *</label></td>
							</tr>
							<tr>
								<td><label for="nomePaciente">Nome *</label></td>
								<td colspan=2><input type="text" name="nomePaciente" value=""/></td>
								<td class="sexo">&nbsp;<input type="radio" name="sexoPaciente" value="M"/>Masculino</td>
							</tr>
							<tr>
								<td><label for="nascimentoPaciente">Data de nascimento *</label></td>
								<td colspan=2>
									<input type="text" value="" size="8" name="nascimentoPaciente" onkeyup="mascaraData(this)" id="nascimentoPaciente" placeholder="__/__/____" maxlength="10"/>
									<input type="hidden" name="idadePaciente" id="idadePaciente" value=""/>
								</td>
								<td class="sexo"><input type="radio" name="sexoPaciente" value="F"/>Feminino</td>
							</tr>
							<!--teste de captura de value em java script -->
							<td colspan=2>
								<div id="receberNascimento" class="imprimirMenorMaior"></div>
							</td>
							<!--teste de captura de value em java script -->
							<tr>
								<td colspan=4>
									<fieldset class="responsavel">
										<legend id="legendaFieldset">Responsável</legend>
										<table width="90%" border=0>
											<tr>
												<td colspan=2>Os campos seguintes são obrigatórios para menores de 18 anos.</td>
											</tr>
											<tr>
												<td><label for="responsavelPaciente">Nome </label></td><td><input type="text" size="28" name="responsavelPaciente" id="responsavelPaciente" value=""/></td>
											</tr>
											<tr>
												<td><label for="telefoneResponsavel">Telefone </label></td><td><input type="text" size="2" name="dddResponsavel" id="dddResponsavel" value="" placeholder="DDD" maxlength="2"/>  <input type="text" name="telefoneResponsavel" id="telefoneResponsavel" value="" maxlength="9"/></td>
											</tr>
										</table>
									</fieldset>
								</td>
							</tr>
							<tr>
								<td colspan=4 class="rodape-tabela">
								<button type="submit" class="btn btn-primary">Cadastrar</button>
							<button type="reset" class="btn btn-secondary">Limpar</button>
									<a href="principal.php"><button type="button" class="btn btn-danger">Voltar</button></a>
									<a href="?pagina=paciente/paciente-c.php" title="Consultar"><img src="./images/Pesquisar.bmp" class="botaoConsultar"/></a>
								</td>
							</tr>
					</table>
								<br>
				</form>
			</div>
		</main>
		<script src="javascript/jquery.js"></script>
		<script src="javascript/validarIdade.js"></script>
	</body>
</html>