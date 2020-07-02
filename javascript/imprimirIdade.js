function ChamarLink() {
    var valorCombo = document.getElementById("selectOK").value;
    
    var	codigo = valorCombo.split('*');
    var	dataNascimento = codigo[1].split('-');
    
    var dataAtual =	new Date();

    var intervalo = dataAtual - dataNascimento;

    var dias = parseInt((dataAtual - intervalo) / (24 * 3600 * 1000));
    
    var anoNascimento = dataNascimento.getFullYear();
	var anoAtual = dataAtual.getFullYear();
	var mesNascimento = dataNascimento.getMonth();
	var mesAtual = dataAtual.getMonth();

    var meses = (mesAtual+12*anoAtual)-(mesNascimento+12*anoNascimento);
	var anos = dataAtual.getFullYear()-dataNascimento.getFullYear();  
        
    document.getElementById("receberLink").innerHTML = "Idade: "+anos+" ano(s), "+meses+" mes(es) e "+dias+ " dia(s).";
}