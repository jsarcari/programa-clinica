<?php
    if(isset($_GET['chave'])) {
		$chave = $_GET['chave'];
	}
    
    ob_start();
    include_once("./fpdf/fpdf.php");
	include_once("../classes/atendimentos.class.php");
	include_once("../classes/conexao.class.php");

    function calcularIdade($dataAtendimento, $dataNascimento) {
        list($diaAtendimento,$mesAtendimento,$anoAtendimento) = explode('/',$dataAtendimento);
        list($diaNascimento,$mesNascimento,$anoNascimento) = explode('/',$dataNascimento);

        $anoIdade = $anoAtendimento-$anoNascimento;
        $mesIdade = $mesAtendimento-$mesNascimento;
        $diaIdade = $diaAtendimento-$diaNascimento;

        if($anoIdade>=0) {
            if($diaIdade<0) {
                if(((((($mesAtendimento==1||$mesAtendimento==3)||$mesAtendimento==5)||$mesAtendimento==7)||$mesAtendimento==8)||$mesAtendimento==10)||$mesAtendimento==12) {
                    $diaIdade+=31;
                } else if ($mesAtendimento==2) {
                    if ($anoAtendimento%4==0) {
                        $diaIdade+=29;
                    } else {
                        $diaIdade+=28;
                    }
                } else {
                    $diaIdade+=30;
                }
            }

            if($mesNascimento>$mesAtendimento) {
                $anoIdade--;
            } else if (($mesNascimento==$mesAtendimento)&&($diaNascimento>$diaAtendimento)){
                $anoIdade--;
                $mesIdade--;
            }

            if($mesIdade<0){
                $mesIdade+=12;
            }

            if($diaNascimento>$diaAtendimento){
                $mesIdade--;
            }
            $idade = $anoIdade . " ano(s), " . $mesIdade . " mes(es) e " . $diaIdade . " dia(s)";
        } else {
            $anoIdade=0;
        }

        return $idade;
    }
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
        $pdf->AddPage();
        $pdf->SetFont("Arial",'B',16);
        $pdf->Cell(190,10,utf8_decode("Comprovante de atendimento"),0,0,'C');
        $pdf->Ln(15);
        $pdf->SetFont("Arial",'',12);
        $pdf->Cell(60,10,utf8_decode("Paciente: "),0,0,'L');
        $pdf->Cell(130,10,utf8_decode($res['nomePaciente']),0,0,'L');
        $pdf->Ln();
        $pdf->Cell(60,10,utf8_decode("Data do atendimento: "),0,0,'L');
        $pdf->Cell(130,10,utf8_decode(date_format(date_create($res['dataAtendimento']),'d/m/Y')),0,0,'L');
        $pdf->Ln();
        $pdf->Cell(60,10,utf8_decode("Nascimento: "),0,0,'L');
        $pdf->Cell(130,10,utf8_decode(date_format(date_create($res['nascimentoPaciente']),'d/m/Y')),0,0,'L');
        $pdf->Ln();
        $pdf->Cell(60,10,utf8_decode("Idade: "),0,0,'L');
        $idade = calcularIdade(date_format(date_create($res['dataAtendimento']),'d/m/Y'),date_format(date_create($res['nascimentoPaciente']),'d/m/Y'));
        $pdf->Cell(130,10,utf8_decode($idade),0,0,'L');
        ob_start();
        $pdf->Output();

    } catch (PDOException $e) {
        exit('Erro: ' . $e->getMessage());
    }
?>