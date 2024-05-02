<?php
    use PHPUnit\Framework\TestCase;
    include_once("classes/conexao.class.php");
    include_once("classes/atendimentos.class.php");

    class AtendimentoTest extends TestCase {

        public function testAtendimentoDeveReceberPacientes() {
            $atendimento = new Atendimentos($codigoAtendimento,$senhaAtendimento,$guicheAtendimento,$dataAtendimento,$horaAtendimento,$codigoPaciente,$convenioAtendimento,$desdobramentoAtendimento);

            $this->assertTrue($atendimento->localizarAtendimento(1));
        }

        public function testMaisDeUmAtendimentoNoMesmoGuicheNoMesmoHorario() {
            $maisDeUmAtendimento = null;
            $atendimento = new Atendimentos($codigoAtendimento,$senhaAtendimento,$guicheAtendimento,$dataAtendimento,$horaAtendimento,$codigoPaciente,$convenioAtendimento,$desdobramentoAtendimento);
            $horarios = $atendimento->listarHorarios();
            $guichesHorarios = $atendimento->listarGuichePorHorarios($horarios);

            foreach ($guichesHorarios as $guicheHorario => $horas) {
                foreach ($horas as $guiches => $guiche) {
                    foreach ($guiche as $count) {
                        if ($count > 1) {
                            $maisDeUmAtendimento = $guiche;
                        }
                    }
                }
            }

            $this->assertNull($maisDeUmAtendimento);
        }
    }
?>