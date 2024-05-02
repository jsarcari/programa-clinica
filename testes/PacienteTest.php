<?php
    use PHPUnit\Framework\TestCase;
    include_once("classes/conexao.class.php");
    include_once("classes/paciente.class.php");

    class PacienteTest extends TestCase {

        public function testVerificarSeExistePaciente() {
            $paciente 	= new Paciente($codigoPaciente,$nomePaciente,$sexoPaciente,$nascimentoPaciente,$responsavelPaciente,$dddResponsavel,$telefoneResponsavel);
            
            $this->assertTrue($paciente->localizarPaciente(1));
        }

        public function testPacienteMenorDeIdadeSemResponsavel() {
            $semResponsavel = null;
            $paciente 	= new Paciente($codigoPaciente,$nomePaciente,$sexoPaciente,$nascimentoPaciente,$responsavelPaciente,$dddResponsavel,$telefoneResponsavel);
            $pacientes = $paciente->listarPaciente();
            
            foreach ($pacientes as $pac) {
                if ($paciente->calcularIdade($pac['nascimentoPaciente']) < 18) {
                    if (!$pac['responsavelPaciente'] || !$pac['telefoneResponsavel']) {
                        $semResponsavel = $pac;
                    }
                }
            }

            $this->assertNull($semResponsavel);
        }
    }
?>