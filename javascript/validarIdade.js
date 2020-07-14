var nascimentoPaciente = $("#nascimentoPaciente");

function calcularIdade() {
	var dataAtual = new Date();
		
	var nascimentoParts = nascimentoPaciente.val().split('/');
					
	var diaNascimento = nascimentoParts[0];
	var mesNascimento = nascimentoParts[1];
	var anoNascimento = nascimentoParts[2];

	var dataNascimento = new Date(0 + anoNascimento, 0 + mesNascimento - 1, 0 + diaNascimento);
				
	var anoNascimento = dataNascimento.getFullYear();
	var mesNascimento = dataNascimento.getMonth();
	var diaNascimento = dataNascimento.getDate();

	var idade = dataAtual.getFullYear()-dataNascimento.getFullYear();
				
	if (dataAtual.getMonth() < dataNascimento.getMonth()) {
		idade--;
	} 
				
	if (dataAtual.getMonth() == dataNascimento.getMonth()) {
		if (dataAtual.getDate() < dataNascimento.getDate()) {
			idade--;
		}
	}

	return idade;
}

var anos = calcularIdade();
	
nascimentoPaciente.on("input", function() {
	if (nascimentoPaciente.val().length == 10) {
		anos = calcularIdade();
		$("#idadePaciente").val(anos);
		console.log($("#idadePaciente").val());
				
		if(anos >= 18){
			$("#receberNascimento").text("Paciente maior de 18 anos.");
		}else{
			$("#receberNascimento").text("Paciente menor de 18 anos.");
		}
	} else {
		$("#receberNascimento").text(" ");
		$("#idadePaciente").val("");
	}
});

if ($("#caso").text() == "Alterar") {
	$("#idadePaciente").val(anos);
	console.log($("#idadePaciente").val());
}