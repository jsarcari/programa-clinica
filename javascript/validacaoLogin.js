function validar(){
	if (document.formLogin.usuario.value == "") {
		alert("Usu�rio n�o informado.");
		document.formLogin.usuario.focus();
		return false;
	}
	
	if (document.formLogin.senha.value == "") {
		alert("Senha n�o informada.");
		document.formLogin.senha.focus();
		return false;
	}
}