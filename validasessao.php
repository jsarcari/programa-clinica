<?php
	session_start();
	ob_start();
		
	if(!isset ($_SESSION['id']) AND !isset ($_SESSION['nome'])):
		echo '<title>Sessão expirada</title>Sessão expirada. <br><a href="index.php"><input type="button" value="Logar"/></a>';
		die;
	endif;
	
?>