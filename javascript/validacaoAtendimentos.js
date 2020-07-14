function validarAtendimento(){
	
	if (document.form1.guicheAtendimento.value == "") {
		alert("O guichê deve ser informado.");
		document.form1.guicheAtendimento.focus();
		return false;
	} else if (document.form1.senhaAtendimento.value == "") {
		alert("A senha deve ser informada.");
		document.form1.senhaAtendimento.focus();
		return false;
	} else if (document.form1.codigoPaciente.value == "") {
		alert("O paciente deve ser informado.");
		document.form1.codigoPaciente.focus();
		return false;
	} else if (document.form1.convenioAtendimento.value == "") {
		alert("O convênio deve ser informado.");
		document.form1.convenioAtendimento.focus();
		return false;
	} else {
			var valorSelect = $("#selectOK").val();
			var paciente    = valorSelect.split('*');
			var nome        = paciente[2];
			var idade       = $(".imprimirIdade").text();
		
			var janela = window.open('','','width=800,heigth=600');
			janela.document.write('<html><head>');
			janela.document.write('<title>Comprovante de atendimento</title></head>');
			janela.document.write('<body>');
			janela.document.write('<h1>Comprovante de atendimento</h1>');
			janela.document.write('<p>Paciente: ' + nome + '</p>');
			janela.document.write('<p>Idade: ' + idade + '</p>');
			janela.document.write('</body></html>');
			janela.document.close();
			janela.print();
			//var doc = new jsPDF();
			//doc.text('Hello world!', 10, 10);
			return true;
	}
}