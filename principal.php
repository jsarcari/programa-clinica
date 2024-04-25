<?php
	include_once 'validasessao.php';
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link rel="stylesheet" type="text/css" href="estilo.css"/>
	<link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
	
	</head>
	<body>
		<header>
			<div class="caixa">
				<nav>
					<ul>
						<li><a href="?pagina=home.php">Home</a></li>
						<li><a href="?pagina=paciente/cadastroPaciente-f.php">Paciente</a></li>
						<li><a href="?pagina=atendimentos/atendimentos-f.php">Atendimento</a></li>
						<li><a href="?pagina=painelVisualizacao.php">Painel</a></li>
						<li><a href="logoff.php" title="Sair"><span class="fas fa-sign-out-alt"></span></a></li>
					</ul>
				</nav>
			</div>
		</header>
			<?php
				if (isset($_GET['pagina'])) {
					include($_GET['pagina']);
				}else{
					include("home.php");
				}
			?>
		<footer>
		<p class="copyright">&copy; Juan dos Santos Arcari - 2014-<?php echo date('Y'); ?></p>
		</footer>
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>