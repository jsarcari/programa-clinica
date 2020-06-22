<?php
	error_reporting(0);

	$codigoAtendimento			= $_POST['codigoAtendimento'];
	$senhaAtendimento			= $_POST['senhaAtendimento'];
	$guicheAtendimento			= $_POST['guicheAtendimento'];
	$dataAtendimento			= $_POST['dataAtendimento'];
	$horaAtendimento			= $_POST['horaAtendimento'];
	$codigoPaciente				= $_POST['codigoPaciente'];
	$convenioAtendimento		= $_POST['convenioAtendimento'];
	$desdobramentoAtendimento	= $_POST['desdobramentoAtendimento'];
	
	
	/*teste de captura por javascript*/
	
	//separa o código do paciente e a data de nascimento que vieram do form, e armazena apenas o codigo na variável '$codigoPaciente':
	
	list($A,$B)=explode('*',$codigoPaciente); //separa a variável com o código e a data vindos do form
	$codigoPaciente=$A;						//substitui o valor vindo do formulario com a data para apenas o codigo.
	
	/*teste de captura por javascript*/
	
	
	if(isset($_GET['acao'])) {
		$acao = $_GET['acao'];
	}
	
	if(isset($_GET['chave'])) {
		$chave = $_GET['chave'];
	}
	
	include_once("../classes/atendimentos.class.php");
	include_once("../classes/conexao.class.php");

	$conexao = new Conexao();
	$pdo = $conexao->conectar();
	$atendimento 	= new Atendimentos($codigoAtendimento, $senhaAtendimento, $guicheAtendimento, $dataAtendimento, $horaAtendimento, $codigoPaciente, $convenioAtendimento, $desdobramentoAtendimento);
	
	switch ($acao){
		case 0: //inclusão
			if($atendimento->incluirAtendimento()) {
				$mensagem = "Cadastro efetuado com sucesso!";
			}else{
				$mensagem = "Cadastro não efetuado. Verifique!";
			}
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo	"alert(\"$mensagem\");";
			echo	"location.href='../principal.php?pagina=atendimentos/atendimentos-c.php';";
			echo "</script>";
			break;
			
		case 1: // formulário de alteração
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo	"location.href='../principal.php?pagina=atendimentos/atendimentos-a.php&chave=$chave';";
			echo "</script>";
			break;
		
		case 2: //exclusão
			if ($atendimento->excluirAtendimento($chave)) {
				$mensagem = "Atendimento excluído com sucesso!";
			}else {
				$mensagem = "Atendimento não excluído. Verifique!";
			}
			
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo	"alert(\"$mensagem\");";
			echo	"location.href='../principal.php?pagina=atendimentos/atendimentos-c.php';";
			echo "</script>";
			break;
			
		case 3: // alteração
			if ($atendimento->alterarAtendimento($chave)) {
				$mensagem = "Atendimento alterado com sucesso!";
			}else{
				$mensagem = "Atendimento não alterado. Verifique!";
			}
			
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo	"alert(\"$mensagem\");";
			echo	"location.href='../principal.php?pagina=atendimentos/atendimentos-c.php';";
			echo "</script>";
			break;
	}
	$pdo = $conexao->encerrar();
?>