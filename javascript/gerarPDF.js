if ($(".registros").text()=="Atendimentos") {
    console.log("ok");
    $("#gerarPDF").click(function(event) {
        event.preventDefault();
        var nome = $(".info-nome").text();
        var janela = window.open('','','width=800,heigth=600');
        janela.document.write('<html><head>');
        janela.document.write('<title>Comprovante de atendimento</title></head>');
        janela.document.write('<body>');
        janela.document.write('<h1>Comprovante de atendimento</h1>');
        janela.document.write('<p>Paciente: ' + nome + '</p>');
        //janela.document.write('<p>Idade: ' + idade + '</p>');
        janela.document.write('</body></html>');
        janela.document.close();
        janela.print();
    });
}