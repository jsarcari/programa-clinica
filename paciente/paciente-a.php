<!DOCTYPE html>
<html>
<head>
	<meta name="decription" content="formularios em HTML">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Alterar paciente</title>
	<link rel="stylesheet" type="text/css" href="./estilo.css"/>
	
	<script type="text/javascript" src="javascript/validacaoPaciente.js"></script>
	<script type="text/javascript" src="javascript/validarIdade.js"></script>
	<script type="text/javascript" src="javascript/mascaraData.js"></script>
	<script type="text/javascript" src="javascript/somenteNumero.js"></script> 
</head>
<body>
<?php
	ob_start();
	if(isset($_GET['chave'])) {
		$chave = $_GET['chave'];
	}

	include_once("./classes/paciente.class.php");
	
	$paciente 	= new Paciente($codigoPaciente,$nomePaciente,$sexoPaciente,$nascimentoPaciente,$responsavelPaciente,$dddResponsavel,$telefoneResponsavel);
	
	if ($paciente->localizarPaciente($chave)) {
		$codigoPaciente			=	$paciente->getCodigoPaciente();
		$nomePaciente			=	$paciente->getNomePaciente();
		$sexoPaciente			=	$paciente->getSexoPaciente();
		$nascimentoPaciente		=	$paciente->getNascimentoPaciente();
		$responsavelPaciente	=	$paciente->getResponsavelPaciente();
		$dddResponsavel			=	$paciente->getDddResponsavel();
		$telefoneResponsavel	=	$paciente->getTelefoneResponsavel();
	}

?>
<div class="formulario">
	<form name="form" method="POST" action="paciente/cadastroPaciente-p.php?acao=3&chave=<?php echo $codigoPaciente; ?>" onsubmit="return validar();">
		<table>
			<tr>
				<td colspan=4><h2>Alterar paciente</h2></td>
			</tr>
			<tr>
				<td colspan=4>Campos com * são de preenchimento obrigatório.</td>
			</tr>
			<tr>
				<td><label for="codigoPaciente">Código</label></td>
				<td colspan=2><?php echo $codigoPaciente ?><input type="hidden" name="codigoPaciente" value="<?php echo $codigoPaciente; ?>"/></td>
				<td class="sex"><label for="sexoPaciente">  Sexo *</label></td>
			</tr>
			<tr>
				<td><label for="nomePaciente">Nome *</label></td>
				<td colspan=2><input type="text" name="nomePaciente" value="<?php echo $nomePaciente; ?>"/></td>
				<td class="sexo">&nbsp;<input type="radio" name="sexoPaciente" value="M" <?php if($sexoPaciente == "M"){ echo "checked"; }; ?>/>Masculino</td>
			</tr>
			<tr>
				<td><label for="nascimentoPaciente">Data de nascimento *</label></td>
				<td colspan=2><input type="text" value="<?php echo date_format(date_create($nascimentoPaciente),'d/m/Y') ?>" size="8" name="nascimentoPaciente" onkeyup="mascaraData(this)" id="nascimentoPaciente" placeholder="__/__/____" maxlength="10"/>
					<input type="button" value="Verificar" name="btn_vai" onClick="validarIdade(this.form,false);" onclick="validarIdade( false )"/></td>
				</td>
				<td class="sexo"><input type="radio" name="sexoPaciente" value="F" <?php if($sexoPaciente == "F"){ echo "checked"; }; ?>/>Feminino</td>
			</tr>
			<tr>
				<td colspan=4>
					<fieldset class="responsavel">
						<legend>Responsável</legend>
						<table width="90%" border=0>
							<tr>
								<td colspan=2>Os campos seguintes são obrigatórios para menores de 18 anos.</td>
							</tr>
							<tr>
								<td>
									<label for="responsavelPaciente">Nome </label>
								</td>
								<td>
									<input type="text" size="28" name="responsavelPaciente" value="<?php echo $responsavelPaciente; ?>"/>
								</td>
							</tr>
							<tr>
								<td>
									<label for="telefoneResponsavel">Telefone </label>
								</td>
								<td>
									<input type="text" size="2" name="dddResponsavel" value="<?php echo $dddResponsavel; ?>" placeholder="DDD" maxlength="2"/>  
									<input type="text" name="telefoneResponsavel" value="<?php echo $telefoneResponsavel; ?>"/>
								</td>
							</tr>
						</table>
					</fieldset>
				</td>
			</tr>
			<tr>
				<td colspan=4 class="rodape-tabela">
					<button type="submit" class="btn btn-primary">Alterar</button>
					<a href="?pagina=paciente/paciente-c.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
				</td>
			</tr>
		</table>
		<br>
	</form>
</div>
</body>
</html>