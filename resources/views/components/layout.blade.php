<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
        <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

        <title>{{ $title }}</title>
	
	</head>
	<body>
		<header>
			<div class="caixa">
				<nav>
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/pacientes/cadastrar">Paciente</a></li>
						<li><a href="/atendimentos/cadastrar">Atendimento</a></li>
						<li><a href="?pagina=painelVisualizacao.php">Painel</a></li>
						<li><a href="logoff.php" title="Sair"><span class="fas fa-sign-out-alt"></span></a></li>
					</ul>
				</nav>
			</div>
		</header>
        <main class="normal">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
    
			{{ $slot }}
        </main>
		<footer>
		    <p class="copyright">&copy; Juan dos Santos Arcari - 2014-{{ date('Y') }}</p>
		</footer>
	</body>
</html>