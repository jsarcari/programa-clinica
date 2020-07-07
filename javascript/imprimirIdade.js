function ChamarLink() {
    var valorCombo = document.getElementById("selectOK").value;
    
    var	codigo	= valorCombo.split('*');
    var	dataNascimento = codigo[1].split('-');
    
    var dataSistemaCompleta	= new Date();
    
    var anoSistema	= dataSistemaCompleta.getFullYear();
    var mesSistema	= dataSistemaCompleta.getMonth();
    mesSistema++;
    var diaSistema	= dataSistemaCompleta.getDate();
    
    var anoNascimento = dataNascimento[0];
    var mesNascimento = dataNascimento[1];
    var diaNascimento = dataNascimento[2];
  
    var	anoIdade = anoSistema-anoNascimento;	//calcula a diferenca de anos e atribui o resultado a variavel '$anoIdade';
    var	mesIdade = mesSistema-mesNascimento;	//calcula a diferenca de meses e atribui o resultado a variavel '$mesIdade';
    var	diaIdade = diaSistema-diaNascimento;	//calcula a diferenca de dia e atribui o resultado a variavel '$diaIdade';
        
        
    if (anoIdade>=0){ 								//valida se resultado do ano for maior ou igual a zero

            if (diaIdade<0) {
                if(((((((mesSistema==1)||(mesSistema==3))||(mesSistema==5))||(mesSistema==7))||(mesSistema==8))||(mesSistema==10))||(mesSistema==12)) {
                    diaIdade+=31;
                } else if (mesSistema==2) {
                    if (anoSistema%4==0) {
                        diaIdade+=29;
                    } else {
                        diaIdade+=28;
                    }
                } else {
                    diaIdade+=30;
                }
                    
            }			
                    
            if (mesNascimento>mesSistema){
                anoIdade--;
            } else if ((mesNascimento==mesSistema)&&(diaNascimento>diaSistema)){
                anoIdade--;
                mesIdade--;
            }

            if (anoIdade<0) {
                anoIdade=0;
            }
            
            if (mesIdade<0){
                mesIdade+=12;
            }

            if (diaNascimento>diaSistema) {
                mesIdade--;
            }
        
        document.getElementById("receberLink").innerHTML = "Idade: "+anoIdade+" ano(s), "+mesIdade+" mes(es) e "+diaIdade+ " dia(s).";
    }
}