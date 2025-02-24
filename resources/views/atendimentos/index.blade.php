<x-layout title="Registro de atendimentos">
    <table class="table table-hover" id="tabelaRegistro">
        <tr><td colspan="7"><h2><span class="registros">Atendimentos</span></h2></td></tr>
        <tr><td colspan="7"><label for="filtrar-tabela">Pesquisar:</label>
            <input type="text" name="filtro" size="30" id="filtrar-tabela" placeholder="Nome do paciente"/></td></tr>
        <tr><th>Código</th><th>Data</th>
        <th>Paciente</th><th>Convênio</th><th colspan=3>Ação</th></tr>
        
        @if (empty($atendimentos))
            <tr><td colspan=9>Sem registros para consultar</td></tr>
            <td align="center" colspan=5>
            <a href="/atendimentos/cadastrar"><input type="button" title="Voltar" value="Voltar">
            </td>
        @else
            @foreach ($atendimentos as $atendimento)
                <tr class="tabelaTodos">
                
                    <td><b> {{ $atendimento->codigoAtendimento }}</td>
                    <td><?php		echo date_format(date_create($atendimento->dataAtendimento),'d/m/Y') . "  " . date_format(date_create($atendimento->horaAtendimento),'H:i'); ?></td>
                    <td class="info-nome">{{ $atendimento->nomePaciente }}</td>
                    <td>{{ $atendimento->convenioAtendimento }}</td>
                    <td><a id="gerarPDF" href="pdf/gerarPDF.php?chave=<?php echo $atendimento['codigoAtendimento']; ?>" target="_blank"><i class="fas fa-print" title="Gerar comprovante"></i></a></td>
                    <td><a href="atendimentos/atendimentos-p.php?acao=1&chave={{$atendimento->codigoAtendimento}}"><img src="./images/gridalterar.bmp" title="Alterar"/></a></td>
                    <td><a href="#"><img src="./images/gridexcluir.bmp" title="Excluir" data-toggle="modal" data-target="#modal-{{$atendimento->codigoAtendimento}}"></a></td>
                <div class="modal fade" id="modal-{{$atendimento->codigoAtendimento}}>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content background1">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmar exclusão</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="formExcluir" method="POST" action="{{ route('atendimentos.destroy', $atendimento->codigoAtendimento) }}">
                                    @csrf
                                    @method('DELETE')
                                    Deseja excluir o atendimento <b>#{{ $atendimento->codigoAtendimento }}</b>?
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Excluir</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </tr>
            @endforeach
            
            <tr>
            <td><a href="/atendimentos/cadastrar" title="Atendimento"><img name="botaoVoltar" src="./images/voltar.png"/></a><a href="/atendimentos" title="Atualizar">
            <img name="botaoAtualizar" src="./images/atualizar.bmp"/></a></td>
        @endif
    </table>
</x-layout>