function validar(){
	if (document.formLogin.usuario.value == "") {
		alert("Usuário não informado.");
		document.formLogin.usuario.focus();
		return false;
	}
	
	if (document.formLogin.senha.value == "") {
		alert("Senha não informada.");
		document.formLogin.senha.focus();
		return false;
	}
}