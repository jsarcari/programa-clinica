<?php ob_start();

	session_start();

	unset($_SESSION[id]);
	unset($_SESSION[nome]);

	header("Location: index.php");
?>