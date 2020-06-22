<!DOCTYPE html>
<?php
	error_reporting(0);
	include_once 'validasessao.php';
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
		<script language="javascript">
			function conteudo(){
				d = document;
				d.getElementByld(conteudo).innerHtml="conteudo";
			}
		</script>
	
	</head>
	<body>
		<header>
			<div class="caixa">
				<img src="imagens/transp.png">
				<nav>
					<ul>
						<li><a href="?pagina=home.html">Home</a></li>
						<li><a href="?pagina=paciente/cadastroPaciente-f.php">Paciente</a></li>
						<li><a href="?pagina=atendimentos/atendimentos-f.php">Atendimentos</a></li>
						<li><a href="?pagina=painelVisualizacao.php">Painel</a></li>
						<li><a href="logoff.php">Sair</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main>
			<?php
				if (isset($_GET['pagina'])) {
					include($_GET['pagina']);
				}else{
					include("home.html");
				}
			?>
		</main>
		<footer>
		<p class="copyright">&copy; Juan dos Santos Arcari - 2020</p>
		</footer>
	</body>
</html>