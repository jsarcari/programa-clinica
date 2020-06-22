function validar() {
		if (document.form.nomePaciente.value == ""){
			alert("O campo nome deve ser preenchido.");
			document.form.nomePaciente.focus();
			return false;
		}
		
		if (document.form.sexoPaciente[0].checked == false && document.form.sexoPaciente[1].checked == false){
			alert("O campo sexo deve ser preenchido.");
			document.form.sexoPaciente[0].focus();
			document.form.sexoPaciente[1].focus();
			return false;
		}
		
		if (document.form.nascimentoPaciente.value == ""){
			alert("O campo data de nascimento deve ser preenchido.");
			document.form.nascimentoPaciente.focus();
			return false;
		}
}
