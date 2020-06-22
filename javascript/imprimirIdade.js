function ChamarLink() {
    var valorCombo = document.getElementById("selectOK").value;
    
    var	codigo	=	valorCombo.split('*');
    var	dataNascimento=codigo[1].split('-');
    
    var dataSistemaCompleta	=	new Date();;
    
    //var dataSistema=dataSistemaCompleta.split('/');
    
    var anoSistema	=	dataSistemaCompleta.getFullYear();
    var mesSistema	= dataSistemaCompleta.getMonth();
    var diaSistema	=	dataSistemaCompleta.getDay();
    
    var anoNascimento=dataNascimento[0];
    var mesNascimento=dataNascimento[1];
    var diaNascimento=dataNascimento[2];
        
    var	anoIdade		=	(anoSistema-anoNascimento);	//calcula a diferenca de anos e atribui o resultado a variavel '$anoIdade';
    var	mesIdade	=	(mesSistema-mesNascimento);	//calcula a diferenca de meses e atribui o resultado a variavel '$mesIdade';
    var	diaIdade		=	(diaSistema-diaNascimento);	//calcula a diferenca de dia e atribui o resultado a variavel '$diaIdade';
        
        
    if(anoIdade>=0){ 								//valida se resultado do ano for maior ou igual a zero

            if(diaIdade<0){
                if(((((((mesSistema==1)||(mesSistema==3))||(mesSistema==5))||(mesSistema==7))||(mesSistema==8))||(mesSistema==10))||(mesSistema==12)){
                    diaIdade	=	(diaIdade+31);
                }else if(mesSistema==2){
                    if((anoSistema%4==0)&&(anoSistema%100!=0)){
                        diaIdade	=	(diaIdade+29);
                    }else{
                        diaIdade	=	(diaIdade+28);
                    }
                }else{
                    diaIdade	=	(diaIdade+30);
                }
                    
            }			
                    
            if(mesNascimento>mesSistema){
                anoIdade=(anoIdade-1);
            }else if((mesNascimento==mesSistema)&&(diaNascimento>diaSistema)){
                anoIdade=(anoIdade-1);
                mesIdade=(mesIdade-1);
            }
            if(anoIdade<0){
                anoIdade=0;
            }
            
            if(mesIdade<0){
                mesIdade	=	(mesIdade+12);
            }
                
            
            var resultado	=	"Idade: "+anoIdade+"-Mes: "+mesIdade+"-dia:"+diaIdade;
        
        document.getElementById("receberLink").innerHTML = "Idade: "+anoIdade+" ano(s), "+mesIdade+" mes(es) e "+diaIdade+ " dia(s).";
    }
}