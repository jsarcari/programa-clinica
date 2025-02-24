<x-layout title="Página Inicial">
    <ul class="paginas">
        <li>
            <h2>Paciente</h2>
            <img  width="80%" src="images/paciente.jpeg">
            <p></p>
            <p>
                <a href="/pacientes"><span class="fas fa-list"></span>Listar</a>
                &nbsp;<a href="/pacientes/cadastrar"><span class="fas fa-plus-circle"></span>Cadastrar</a>
            </p>
        </li>
        <li>
            <h3>Atendimento</h3>
            <img width="80%" src="images/atendimento.jpg">
            <p></p>
            <p>
                <a href="/atendimentos"><span class="fas fa-list"></span>Listar</a>
                &nbsp;<a href="/atendimentos/cadastrar"><span class="fas fa-plus-circle"></span>Cadastrar</a>
            </p>
        </li>
        <li>
            <h2>Painel</h2>
            <img width="80%" src="images/painel.png">
            <p></p>
            <p>
                <a href="principal.php?pagina=painelVisualizacao.php"><span class="fab fa-sistrix"></span>Visualizar</a>
            </p>
        </li>
    </ul>
</x-layout>