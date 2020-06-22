<!DOCTYPE html>
<html>
<head>
		<meta name="decription" content="formularios em HTML">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Alterar atendimento</title>
		<link rel="stylesheet" type="text/css" href="../estilo.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script type="text/javascript" src="javascript/validacaoAtendimentos.js"></script>
		<script type="text/javascript" src="javascript/imprimirIdade.js"></script>
	</head>
<body>
<?php
	ob_start();
	if(isset($_GET['chave'])) {
		$chave = $_GET['chave'];
	}
	
	include_once("./classes/atendimentos.class.php");
	
	$atendimento 	= new Atendimentos($codigoAtendimento, $senhaAtendimento, $guicheAtendimento, $dataAtendimento, $horaAtendimento, $codigoPaciente, $convenioAtendimento, $desdobramentoAtendimento);
	
	if ($atendimento->localizarAtendimento($chave)) {
		$codigoAtendimento			=	$atendimento->getCodigoAtendimento();
		$senhaAtendimento			=	$atendimento->getSenhaAtendimento();
		$guicheAtendimento			=	$atendimento->getGuicheAtendimento();
		$dataAtendimento			=	$atendimento->getDataAtendimento();
		$horaAtendimento			=	$atendimento->getHoraAtendimento();
		$codigoPaciente				=	$atendimento->getCodigoPaciente();
		$convenioAtendimento		=	$atendimento->getConvenioAtendimento();
		$desdobramentoAtendimento	=	$atendimento->getDesdobramentoAtendimento();
		
	}
?>
	
		<!--teste de captura de value em java script -->
	<div class="formulario">
		<form name="form1" method="POST" action="atendimentos/atendimentos-p.php?acao=3&chave=<?php echo $codigoAtendimento; ?>" onsubmit="return validarAtendimento();">
			<table>
				<tr>
					<td colspan=4><h2>Alterar atendimento</h2></td>
				</tr>
				<tr>
					<td colspan=4>Campos com * são de preenchimento obrigatório.</td>
				</tr>
				<tr>
				<td><label for="codigoAtendimento">Código</label></td>
				<td><?php echo $codigoAtendimento ?><input type="hidden" name="codigoAtendimento" value="<?php echo $codigoAtendimento; ?>"/></td>
			</tr>
				<tr>
					<td><label for="senhaAtendimento">Senha *</label></td>
					<td><input type="text" size="2" name="senhaAtendimento" value="<?php echo $senhaAtendimento; ?>"/></td>
					<td><label for="guicheAtendimento">Guichê *</label></td>
					<td><select name="guicheAtendimento"><option selected value="<?php echo $guicheAtendimento; ?>"><?php echo $guicheAtendimento; ?></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option></select></td>
				</tr>
				<tr>
					<td><label for="dataAtendimento">Data do atendimento</label></td>
					<td><?php echo date_format(date_create($dataAtendimento),'d/m/Y'); ?><input type="hidden" name="dataAtendimento" value="<?php echo $dataAtendimento;?>"/></td>
					<td><label for="horaAtendimento">Hora</label></td>
					<td>
					<?php echo $horaAtendimento; ?><input type="hidden" name="horaAtendimento" value="<?php echo $horaAtendimento;?>"/></td>
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
					<option selected value="<?php echo $convenioAtendimento; ?>"><?php echo $convenioAtendimento; ?></option>
					<option value="SUS">SUS</option>
					<option value="Particular">Particular</option>
					<option value="Unimed">Unimed</option>
					<option value="Ipergs">Ipergs</option>
					<option value="Outros">Outros</option></select></td>
				</tr>
				<tr rowspan=3>
					<td colspan=4><textarea name="desdobramentoAtendimento" value="<?php echo $desdobramentoAtendimento; ?>" placeholder="Informe aqui o desdobramento do antendimento"></textarea></td>
				</tr>
				<tr>
					<td colspan=4><input type="submit" title="Gravar" value="Gravar"/>
						<a href="?pagina=atendimentos/atendimentos-c.php"><input type="button" title="Voltar" value="Voltar"/></a>
					</td>
				</tr>
			</table>
			<br>
		</form>
	</div>
</body>
</html>