function validar() {
		if (document.form.nomePaciente.value == ""){
			alert("O nome do paciente deve ser preenchido.");
			document.form.nomePaciente.focus();
			return false;
		}
		
		if (document.form.sexoPaciente[0].checked == false && document.form.sexoPaciente[1].checked == false){
			alert("O sexo deve ser preenchido.");
			document.form.sexoPaciente[0].focus();
			document.form.sexoPaciente[1].focus();
			return false;
		}
		
		if (document.form.nascimentoPaciente.value == ""){
			alert("A data de nascimento deve ser preenchido.");
			document.form.nascimentoPaciente.focus();
			return false;
		}

		if (document.form.idadePaciente.value == ""){
			alert("Data inválida");
			document.form.idadePaciente.focus();
			return false;
		}

		if (document.form.idadePaciente.value < 18 && document.form.responsavelPaciente.value == ""){
			alert("O nome do responsável deve ser informado.");
			document.form.responsavelPaciente.focus();
			return false;
		}

		if (document.form.idadePaciente.value < 18 && document.form.dddResponsavel.value == ""){
			alert("O telefone do responsável deve ser informado.");
			document.form.dddResponsavel.focus();
			return false;
		}

		if (document.form.idadePaciente.value < 18 && document.form.telefoneResponsavel.value == ""){
			alert("O telefone do responsável deve ser informado.");
			document.form.telefoneResponsavel.focus();
			return false;
		}
}
