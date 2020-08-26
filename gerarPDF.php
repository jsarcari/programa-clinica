<?php
    if(isset($_GET['chave'])) {
		$chave = $_GET['chave'];
	}
    
    include_once("./fpdf/fpdf.php");
	include_once("./classes/atendimentos.class.php");
	include_once("./classes/conexao.class.php");

    try {
        $conexao        = new Conexao();
        $pdf		    = new FPDF();

        $pdo = $conexao->conectar();
        $query = $pdo->prepare("    SELECT  *
                                    FROM    atendimento
                                    INNER JOIN paciente
                                    ON atendimento.codigoPaciente = paciente.codigoPaciente
                                    WHERE   codigoAtendimento = :codigo;");
        $query->bindValue(':codigo', $chave);
        $query->execute();
        $res = $query->fetch();
    } catch (PDOException $e) {
        exit('Erro: ' . $e->getMessage());
    }
?>