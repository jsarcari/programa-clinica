<?php

	$codigoPaciente 		= $_POST['codigoPaciente'];
	$nomePaciente 			= $_POST['nomePaciente'];
	$sexoPaciente 			= $_POST['sexoPaciente'];
	$nascimentoPaciente 	= $_POST['nascimentoPaciente'];
	$responsavelPaciente 	= $_POST['responsavelPaciente'];
	$dddResponsavel 		= $_POST['dddResponsavel'];
	$telefoneResponsavel 	= $_POST['telefoneResponsavel'];
	
	if(isset($_GET['acao'])) {
		$acao = $_GET['acao'];
	}
	
	if(isset($_GET['chave'])) {
		$chave = $_GET['chave'];
	}
	
	include_once("../classes/paciente.class.php");
	include_once("../classes/conexao.class.php");

	$conexao = new Conexao();
	$pdo = $conexao->conectar();
	$paciente 	= new Paciente($codigoPaciente,$nomePaciente,$sexoPaciente,$nascimentoPaciente,$responsavelPaciente,$dddResponsavel,$telefoneResponsavel);
	
	switch ($acao){
		case 0: // inclusao
			if($paciente->incluirPaciente()){
				$mensagem = "Cadastro efetuado com sucesso!";
				
			}else{
				$mensagem = "Cadastro não efetuado. Verifique!";
			}
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo	"alert(\"$mensagem\");";
			echo	"location.href='../principal.php?pagina=paciente/paciente-c.php';";
			echo "</script>";
			break;
			
		case 1: // abrir formulário de alteração
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo	"location.href='../principal.php?pagina=paciente/paciente-a.php&chave=$chave';";
			echo "</script>";
			break;
			
		case 2: // exclusão
			if ($paciente->excluirPaciente($chave)) {
				$mensagem = "Paciente excluído com sucesso!";
			}else {
				$mensagem = "O paciente não pode ser excluído!";
			}
			
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo	"alert(\"$mensagem\");";
			echo	"location.href='../principal.php?pagina=paciente/paciente-c.php';";
			echo "</script>";
			break;
			
		case 3: // alteração
			if ($paciente->alterarPaciente($chave)) {
				$mensagem = "Paciente alterado com sucesso!";
			}else{
				$mensagem = "Paciente não alterado. Verifique!";
			}
			
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo	"alert(\"$mensagem\");";
			echo	"location.href='../principal.php?pagina=paciente/paciente-c.php';";
			echo "</script>";
			break;
		
	}
	$pdo = $conexao->encerrar();
?>