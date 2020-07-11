
	var nascimentoPaciente = $("#nascimentoPaciente");
	
	nascimentoPaciente.on("input", function() {
		console.log(nascimentoPaciente.val().length);
		if (nascimentoPaciente.val().length == 10) {
			var dataAtual = new Date();
	
			var nascimentoParts = nascimentoPaciente.val().split('/');
				
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
				$("#receberNascimento").text("Paciente maior de 18 anos.");
				$("#responsavelPaciente").attr("disabled",true);
				$("#dddResponsavel").attr("disabled",true);
				$("#telefoneResponsavel").attr("disabled",true);
			}else{
				$("#receberNascimento").text("Paciente menor de 18 anos.");
				$("#responsavelPaciente").attr("disabled",false);
				$("#dddResponsavel").attr("disabled",false);
				$("#telefoneResponsavel").attr("disabled",false);
			}
		} else {
			$("#receberNascimento").text(" ");
		}
	});