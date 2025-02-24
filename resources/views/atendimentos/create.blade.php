<x-layout title="Cadastro de atendimento">
    <div class="formulario">
        <form name="form1" method="POST" action="/atendimentos/salvar" onsubmit="return validarAtendimento();">
            <table>
                <tr>
                    <td colspan=4><h2>Atendimento</h2></td>
                </tr>
                <tr>
                    <td colspan=4>Campos com * são de preenchimento obrigatório.</td>
                </tr>
                <tr>
                    <td><label for="senhaAtendimento">Senha *</label></td>
                    <td><input type="text" size="2" name="senhaAtendimento" value="<?php //echo $atendimento->senhaAtendimento();?>"/></td>
                    <td><label for="guicheAtendimento">Guichê *</label></td>
                    <td><select name="guicheAtendimento"><option value="">Guichê</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option></select></td>
                </tr>
                <tr>
                    <td><label for="dataAtendimento">Data do atendimento</label></td>
                    <?php date_default_timezone_set("America/Sao_Paulo");
                    $dataAtendimento = date("d/m/Y");
                    ?>
                    <td>
                    <?php echo $dataAtendimento;?><input type="hidden" name="dataAtendimento" value="<?php echo $dataAtendimento;?>"/></td>
                    <td><label for="horaAtendimento">Hora</label></td>
                    <?php 
                        date_default_timezone_set("America/Sao_Paulo");
                        $horaAtendimento = date("H:i:s");
                    ?>
                    <td>
                    <?php echo date_format(date_create($horaAtendimento),'H:i'); ?><input type="hidden" name="horaAtendimento" value="<?php echo $horaAtendimento;?>"/></td>
                </tr>
                <tr>
                    <td><label for="codigoPaciente">Paciente *</label></td>
                    <td colspan=3><select name="codigoPaciente" id="selectOK" onchange="ChamarLink();">
                    <option value="0">Selecione o paciente</option>
                    
                    
                    <?php /*$atendimento->buscarPaciente(); */ ?>
                    
                    </select></td>
                </tr>
        
                    <!--teste de captura de value em java script -->
                    <td colspan=2>
                        <div id="receberLink" class="imprimirIdade"></div>
                    </td>
                    <!--teste de captura de value em java script -->
                    
                <tr>
                    <td><label for="convenioAtendimento">Convênio *</label></td>
                    <td colspan=3><select name="convenioAtendimento" value="">
                    <option selected value="">Selecione o convênio</option>
                    <option value="SUS">SUS</option>
                    <option value="Particular">Particular</option>
                    <option value="Unimed">Unimed</option>
                    <option value="Ipergs">Ipergs</option>
                    <option value="Outros">Outros</option></select></td>
                </tr>
                <tr rowspan=3>
                    <td colspan=4><textarea name="desdobramentoAtendimento" value="" placeholder="Informe aqui o desdobramento do antendimento"></textarea></td>
                </tr>
                <tr>
                    <td colspan=4 class="rodape-tabela">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                        <a href="/"><button type="button" class="btn btn-danger">Voltar</button></a>
                        <a href="atendimentos-c" title="Consultar"><img src="./images/Pesquisar.bmp" class="botaoConsultar"/></a>
                    </td>
                </tr>
            </table>
            <br>
        </form>
    </div>
    <script>
        function ChamarLink() {
            var valorSelect = $("#selectOK").val();

            if (valorSelect != "0") {
                
                var	paciente = valorSelect.split('*');
                var	dataNascimento = paciente[1].split('-');
                
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
                        } 
                        
                        if ((mesNascimento==mesSistema)&&(diaNascimento>diaSistema)){
                            anoIdade--;
                            mesIdade=11;
                        }

                        if (anoIdade<0) {
                            anoIdade=0;
                        }
                        
                        if (mesIdade<0){
                            mesIdade+=12;
                        }

                        if ((mesNascimento!=mesSistema) && (diaNascimento>diaSistema)) {
                            mesIdade--;
                        }
                    
                    $("#receberLink").text("Idade: "+anoIdade+" ano(s), "+mesIdade+" mes(es) e "+diaIdade+ " dia(s).");
                }
            } else {
                $("#receberLink").text(" ");
            }
        }
    </script>
</x-layout>