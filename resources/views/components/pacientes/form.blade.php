<div class="formulario">
    <form name="form" method="post" action="{{ $action }}" onsubmit="return validar();">
        @csrf

        @isset($nomePaciente)
        @method('PUT')
        @endisset
        <table>
                <tr>
                    <td colspan=4><h2>Cadastro de pacientes</h2></td>
                </tr>
                <tr>
                    <td colspan=3>Campos com * são de preenchimento obrigatório.</td>
                    <td class="sex"><label for="sexoPaciente">  Sexo *</label></td>
                </tr>
                <tr>
                    <td><label for="nomePaciente">Nome *</label></td>
                    <td colspan=2><input type="text" name="nomePaciente" @isset($nomePaciente)value="{{ $nomePaciente }}"@endisset/></td>
                    <td class="sexo">&nbsp;<input type="radio" name="sexoPaciente" value="M"/>Masculino</td>
                </tr>
                <tr>
                    <td><label for="nascimentoPaciente">Data de nascimento *</label></td>
                    <td colspan=2>
                        <input type="text" @isset($nascimentoPaciente)value="{{ $nascimentoPaciente }}"@endisset size="8" name="nascimentoPaciente" onkeyup="mascaraData(this)" id="nascimentoPaciente" placeholder="__/__/____" maxlength="10"/>
                        <input type="hidden" name="idadePaciente" id="idadePaciente" value=""/>
                    </td>
                    <td class="sexo"><input type="radio" name="sexoPaciente" value="F"/>Feminino</td>
                </tr>
                <td colspan=2>
                    <div id="receberNascimento" class="imprimirMenorMaior"></div>
                </td>
                <tr>
                    <td colspan=4>
                        <fieldset class="responsavel">
                            <legend id="legendaFieldset">Responsável</legend>
                            <table width="90%" border=0>
                                <tr>
                                    <td colspan=2>Os campos seguintes são obrigatórios para menores de 18 anos.</td>
                                </tr>
                                <tr>
                                    <td><label for="responsavelPaciente">Nome </label></td><td><input type="text" size="28" name="responsavelPaciente" id="responsavelPaciente" @isset($responsavelPaciente)value="{{ $responsavelPaciente }}"@endisset/></td>
                                </tr>
                                <tr>
                                    <td><label for="telefoneResponsavel">Telefone </label></td><td><input type="text" size="2" name="dddResponsavel" id="dddResponsavel" @isset($dddResponsavel)value="{{ $dddResponsavel }}"@endisset placeholder="DDD" maxlength="2"/>  <input type="text" name="telefoneResponsavel" id="telefoneResponsavel" @isset($telefoneResponsavel)value="{{ $telefoneResponsavel }}"@endisset maxlength="9"/></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td colspan=4 class="rodape-tabela">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
                        <a href="/"><button type="button" class="btn btn-danger">Voltar</button></a>
                        <a href="/pacientes" title="Consultar"><img src="./images/Pesquisar.bmp" class="botaoConsultar"/></a>
                    </td>
                </tr>
        </table>
        <br>
    </form>
</div>
<script>
    function mascaraData(nascimentoPaciente) {
        
        posicao = nascimentoPaciente.value.length;
        
        switch (posicao) {
            case 2:
                nascimentoPaciente.value += '/';
                break;
            case 5:
                nascimentoPaciente.value += '/';
                break;
        }
    }

    function somenteNumero(k){
        var tecla=(window.event)?event.keyCode:k.which;   
        if((tecla>47 && tecla<58)) return true;
        else{
            if (tecla==8 || tecla==0) return true;
            else  return false;
        }
    }
</script>