function somenteNumero(k){
    var tecla=(window.event)?event.keyCode:k.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}