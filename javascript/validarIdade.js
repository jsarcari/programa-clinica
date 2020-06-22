function validarIdade(form,bool){

dataNasc = document.getElementById("nascimentoPaciente").value;
				
		var dataAtual = new Date();
		var anoAtual = dataAtual.getFullYear();
		var anoNascParts = dataNasc.split('/');
		
		var diaNasc = anoNascParts[0];
		var mesNasc = anoNascParts[1];
		var anoNasc = anoNascParts[2];
		
		var idade = anoAtual - anoNasc;
		
		var mesAtual = dataAtual.getMonth()+1;
		
		if(mesAtual < mesNasc){
			idade--;
		}else{
			if(mesAtual <= mesNasc){
				if(dataAtual.getDay() < diaNasc){
					idade--;
				}
			}
		}
		
		if(idade >= 18){
			
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