<?php
	ob_start();
	//error_reporting(0);
	
	include_once 'validasessao.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Material Design Bootstrap -->
        <link href="MDB-Free_4.19.1/css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="MDB-Free_4.19.1/css/style.css" rel="stylesheet">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="./estilo.css"/>
    </head>
    <body>
        <main class="normal">
            <ul class="paginas">
                <li>
                    <h2>Paciente</h2>
                    <img  width="80%" src="images/paciente.jpeg">
                    <p></p>
                    <p>
                        <a href="principal.php?pagina=paciente/paciente-c.php"><span class="fas fa-list"></span>Listar</a>
                        &nbsp;<a href="principal.php?pagina=paciente/cadastroPaciente-f.php"><span class="fas fa-plus-circle"></span>Cadastrar</a>
                    </p>
                </li>
                <li>
                    <h3>Atendimento</h3>
                    <img width="80%" src="images/atendimento.jpg">
                    <p></p>
                    <p>
                        <a href="principal.php?pagina=atendimentos/atendimentos-c.php"><span class="fas fa-list"></span>Listar</a>
                        &nbsp;<a href="principal.php?pagina=atendimentos/atendimentos-f.php"><span class="fas fa-plus-circle"></span>Cadastrar</a>
                    </p>
                </li>
                <li>
                    <h2>Painel</h2>
                    <img width="80%" src="images/painel.png">
                    <p></p>
                    <p>
                        <a href="principal.php?pagina=painelVisualizacao.php"><span class="fab fa-sistrix"></span>Visualizar</a>
                    </p>
                </li>
            </ul>
    </main>
    </body>
</html>