<?php
	ob_start();

	include_once("classes/conexao.class.php");
	
	session_start();

	unset($_SESSION['id']);
	unset($_SESSION['nome']);
	
	$username = addslashes(htmlentities($_POST['usuario']));
	$password = addslashes(htmlentities($_POST['senha']));
			
	try {
		$conexao = new Conexao();
		$pdo = $conexao->conectar();
		$query	= $pdo->prepare("	SELECT	codigoLogin, usuario, senha
								FROM	login
								WHERE	usuario	= ? AND senha = ?");
		$query->bindValue(1,$username);
		$query->bindValue(2,$password);
		$query->execute();
		$res = $query->fetchAll();
		$nr = $query->rowCount();
			
		if ($nr>0){
				
			foreach($res as $r) {
				$codigoUsuario = $r['codigoLogin'];
				$usuario = $r['usuario'];
				$senha = $r['senha'];
			}
				
			session_start();
			$_SESSION['id']	= $usuario;
			$_SESSION['nome']	= $senha;

			setcookie("exemplo", $codigoUsuario);

			header('Location: principal.php');
			if(($_SESSION['id']=="admin") && ($_SESSION['nome']=="123")){
				if (isset($_GET['pagina'])) {
					include($_GET['pagina']);
				}else{
					include("painelVisualizacao.php");
				}
			}else{
					echo "Você não tem permissão para acessar esta página.";
			}
			$pdo = $conexao->encerrar();
		}else{
			$pdo = $conexao->encerrar();
			$mensagem = "Usuário ou senha inválida.";
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo	"alert(\"$mensagem\");";
			echo	"location.href='index.php';";
			echo "</script>";
			exit;
		}
	} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
	}
	
?>