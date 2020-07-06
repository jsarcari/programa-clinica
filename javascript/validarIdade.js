function validarIdade(form,bool){

	var nascimentoPaciente = document.getElementById("nascimentoPaciente").value;
				
	var dataAtual = new Date();
	
	var nascimentoParts = nascimentoPaciente.split('/');
		
	var diaNascimento = nascimentoParts[0];
	var mesNascimento = nascimentoParts[1];
	var anoNascimento = nascimentoParts[2];

	var dataNascimento = new Date(0 + anoNascimento, 0 + mesNascimento - 1, 0 + diaNascimento);
    
    var anoNascimento = dataNascimento.getFullYear();
	var mesNascimento = dataNascimento.getMonth();
	var diaNascimento = dataNascimento.getDate();

	var anos = dataAtual.getFullYear()-dataNascimento.getFullYear();
	
	if (dataAtual.getMonth() < dataNascimento.getMonth()) {
        anos--;
	} 
	
	if (dataAtual.getMonth() == dataNascimento.getMonth()) {
		if (dataAtual.getDate() < dataNascimento.getDate()) {
			anos--;
		}
	}
		
	if(anos >= 18){
		alert("Paciente maior de idade.");
		document.form.responsavelPaciente.disabled = 1; // para desativado
		document.form.dddResponsavel.disabled = 1;
		document.form.telefoneResponsavel.disabled = 1;
	}else{
		alert("Paciente menor de idade, campos para responsavel são obrigatorios.");
		document.form.responsavelPaciente.disabled = 0;
		document.form.dddResponsavel.disabled = 0;
		document.form.telefoneResponsavel.disabled = 0;
	}
}	