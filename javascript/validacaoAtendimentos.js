function validarAtendimento(){
	
	if (document.form1.guicheAtendimento.value == "") {
		alert("O guichê deve ser informado.");
		document.form1.guicheAtendimento.focus();
		return false;
	}


	if (document.form1.senhaAtendimento.value == "") {
		alert("A senha deve ser informada.");
		document.form1.senhaAtendimento.focus();
		return false;
	}
	
	if (document.form1.codigoPaciente.value == "") {
		alert("O paciente deve ser informado.");
		document.form1.codigoPaciente.focus();
		return false;
	}

	
	if (document.form1.convenioAtendimento.value == "") {
		alert("O convênio deve ser informado.");
		document.form1.convenioAtendimento.focus();
		return false;
	}	
}