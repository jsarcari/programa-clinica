<?php
	ob_start();
	
    error_reporting(0);
	
	include_once ("./classes/atendimentos.class.php");
	
	$atendimento 	= new Atendimentos($codigoAtendimento,$senhaAtendimento,$guicheAtendimento,$dataAtendimento,$horaAtendimento,$codigoPaciente,$convenioAtendimento,$desdobramentoAtendimento);
?>
<html>
	<head>
		<meta name="decription" content="formularios em HTML">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Atendimento</title>
		<link rel="stylesheet" type="text/css" href="./estilo.css"/>
		<script type="text/javascript" src="javascript/validacaoAtendimentos.js"></script>
		<script type="text/javascript" src="javascript/imprimirIdade.js"></script>
	</head>
	<body>
		<main class="normal">
			<!--teste de captura de value em java script -->
			<div class="formulario">
				<form name="form1" method="POST" action="atendimentos/atendimentos-p.php?acao=0" onsubmit="return validarAtendimento();">
					<table>
						<tr>
							<td colspan=4><h2>Atendimento</h2></td>
						</tr>
						<tr>
							<td colspan=4>Campos com * são de preenchimento obrigatório.</td>
						</tr>
						<tr>
							<td><label for="senhaAtendimento">Senha *</label></td>
							<td><input type="text" size="2" name="senhaAtendimento" value="<?php echo $atendimento->senhaAtendimento();?>"/></td>
							<td><label for="guicheAtendimento">Guichê *</label></td>
							<td><select name="guicheAtendimento"><option value="">Guichê</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option></select></td>
						</tr>
						<tr>
							<td><label for="dataAtendimento">Data do atendimento</label></td>
							<?php date_default_timezone_set("Porto_Alegre/Rio_Grande_do_Sul");
							$dataAtendimento = date("d/m/Y");
							?>
							<td>
							<?php echo $dataAtendimento;?><input type="hidden" name="dataAtendimento" value="<?php echo $dataAtendimento;?>"/></td>
							<td><label for="horaAtendimento">Hora</label></td>
							<?php 
								date_default_timezone_set("Porto_Alegre/Rio_Grande_do_Sul");
								$horaAtendimento = date("H:i:s");
							?>
							<td>
							<?php echo date_format(date_create($horaAtendimento),'H:i'); ?><input type="hidden" name="horaAtendimento" value="<?php echo $horaAtendimento;?>"/></td>
						</tr>
						<tr>
							<td><label for="codigoPaciente">Paciente *</label></td>
							<td colspan=3><select name="codigoPaciente" id="selectOK" onchange="ChamarLink();">
							<option value="">Selecione o paciente</option>
							
							
							<?php $atendimento->buscarPaciente(); ?>
							
							</select></td>
						</tr>
				
							<!--teste de captura de value em java script -->
							<td colspan=2>
								<div id="receberLink" class="imprimirIdade"></div>
							</td>
							<!--teste de captura de value em java script -->
							
						<tr>
							<td><label for="convenioAtendimento">Convênio *</label></td>
							<td colspan=3><select name="convenioAtendimento" value="">
							<option selected value="">Selecione o convênio</option>
							<option value="SUS">SUS</option>
							<option value="Particular">Particular</option>
							<option value="Unimed">Unimed</option>
							<option value="Ipergs">Ipergs</option>
							<option value="Outros">Outros</option></select></td>
						</tr>
						<tr rowspan=3>
							<td colspan=4><textarea name="desdobramentoAtendimento" value="" placeholder="Informe aqui o desdobramento do antendimento"></textarea></td>
						</tr>
						<tr>
							<td colspan=4 class="rodape-tabela">
								<button type="submit" class="btn btn-primary">Cadastrar</button>
								<button type="reset" class="btn btn-secondary">Limpar</button>
								<a href="principal.php"><button type="button" class="btn btn-danger">Voltar</button></a>
								<a href="?pagina=atendimentos/atendimentos-c.php" title="Consultar"><img src="./images/Pesquisar.bmp" class="botaoConsultar"/></a>
							</td>
						</tr>
					</table>
				<br>
				</form>
			</div>
		</main>
	</body>
</html>