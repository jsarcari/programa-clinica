<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
		<script type="text/javascript" src="javascript/validacaoLogin.js"></script>
	</head>
	<body>
			
		<form name="formLogin" action="login-p.php" method="POST" onsubmit="return validar();">
			<table class="login">
				<tr rowspan=3>
					<td colspan=2><img class="cabec" width="15%" src="./images/images.jpg"/></td>
				</tr>
				<tr>
					<td colspan=2><h2>Login</h2></td>
				</tr>
				<tr>
					<td>Usuario *</td><td><input type="text" name="usuario" value=""/></td>
				</tr>
				<tr>
					<td>Senha *</td><td><input type="password" name="senha" value=""/></td>
				</tr>
				<tr>
					<td colspan=2><input type="submit" value="Entrar"/>    <input type="reset" value="Limpar"/></td>
				</tr>
			</table>
		</form>

	</body>
</html>
