<?php ob_start();
	include_once("classes/conexao.class.php");

	class Atendimentos {
		private $codigoAtendimento;
		private $senhaAtendimento;
		private $guicheAtendimento;
		private $dataAtendimento;
		private $horaAtendimento;
		private $codigoPaciente;
		private $convenioAtendimento;
		private $desdobramentoAtendimento;
		
		public function __construct($codigoAtendimento,$senhaAtendimento,$guicheAtendimento,$dataAtendimento,$horaAtendimento,$codigoPaciente,$convenioAtendimento,$desdobramentoAtendimento){
			$this->codigoAtendimento		= $codigoAtendimento;
			$this->senhaAtendimento			= $senhaAtendimento;
			$this->guicheAtendimento		= $guicheAtendimento;
			$this->dataAtendimento			= $dataAtendimento;
			$this->horaAtendimento			= $horaAtendimento;
			$this->codigoPaciente			= $codigoPaciente;
			$this->convenioAtendimento		= $convenioAtendimento;
			$this->desdobramentoAtendimento	= $desdobramentoAtendimento;
		}
		
		public function getCodigoAtendimento() {
		return $this->codigoAtendimento;
		}
		
		public function getSenhaAtendimento() {
		return $this->senhaAtendimento;
		}
		
		public function getGuicheAtendimento() {
		return $this->guicheAtendimento;
		}
		
		public function getDataAtendimento() {
		return $this->dataAtendimento;
		}
		
		public function getHoraAtendimento() {
		return $this->horaAtendimento;
		}
		
		public function getCodigoPaciente() {
		return $this->codigoPaciente;
		}
		
		public function getConvenioAtendimento() {
		return $this->convenioAtendimento;
		}
		
		public function getDesdobramentoAtendimento() {
		return $this->desdobramentoAtendimento;
		}
		
		public function setCodigoAtendimento($codigoAtendimento) {
		$this->codigoAtendimento = $codigoAtendimento;
		}
		
		public function setSenhaAtendimento($senhaAtendimento) {
		$this->senhaAtendimento = $senhaAtendimento;
		}
		
		public function setGuicheAtendimento($guicheAtendimento) {
		$this->guicheAtendimento = $guicheAtendimento;
		}
		
		public function setDataAtendimento($dataAtendimento) {
		$this->dataAtendimento = $dataAtendimento;
		}
		
		public function setHoraAtendimento($horaAtendimento) {
		$this->horaAtendimento = $horaAtendimento;
		}
		
		public function setCodigoPaciente($codigoPaciente) {
		$this->codigoPaciente = $codigoPaciente;
		}
		
		public function setConvenioAtendimento($convenioAtendimento) {
		$this->convenioAtendimento = $convenioAtendimento;
		}
		
		public function setDesdobramentoAtendimento($desdobramentoAtendimento) {
		$this->desdobramentoAtendimento = $desdobramentoAtendimento;
		}

		public function converteData($dataAtendimento){

			$dataAtendimento = "$dataAtendimento[6]"."$dataAtendimento[7]"."$dataAtendimento[8]"."$dataAtendimento[9]"."$dataAtendimento[5]"."$dataAtendimento[3]"."$dataAtendimento[4]"."$dataAtendimento[2]"."$dataAtendimento[0]"."$dataAtendimento[1]";
		
			return $dataAtendimento;
		}


/*captura de valores para ser exibido no select do formulário*/		
		public function buscarPaciente(){
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$pacientes = $pdo->query("	SELECT codigoPaciente, nomePaciente, nascimentoPaciente
											FROM   paciente
											ORDER BY nomePaciente", PDO::FETCH_ASSOC);
									
				$rows		= $pacientes->rowCount();
					
				if($rows > 0) {
					foreach ($pacientes as $paciente) {
						echo "<option value='" . $paciente['codigoPaciente']."*".$paciente['nascimentoPaciente']."*".$paciente['nomePaciente']."'";
						if($paciente['codigoPaciente'] == $this->getCodigoPaciente()){
							echo " selected ";
						}
						echo "'>" . $paciente['nomePaciente'].	"</option>";
					}
				} else {
					echo"<option value=\"0\">Sem registros no banco</option>";
				}
				$pdo = $conexao->encerrar();
			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}

		}
		
		public function incluirAtendimento(){
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	INSERT INTO atendimento (
														senhaAtendimento,
														guicheAtendimento,
														dataAtendimento,
														horaAtendimento,
														codigoPaciente,
														convenioAtendimento,
														desdobramentoAtendimento) 
											VALUES (:senha, 
													:guiche, 
													:data, 
													:hora, 
													:paciente, 
													:convenio,
													:desdobramento);");
				$query->bindValue(':senha', $this->getSenhaAtendimento());
				$query->bindValue(':guiche', $this->getGuicheAtendimento());
				$query->bindValue(':data', $this->converteData($this->getDataAtendimento()));
				$query->bindValue(':hora', $this->getHoraAtendimento());
				$query->bindValue(':paciente', $this->getCodigoPaciente());
				$query->bindValue(':convenio', $this->getConvenioAtendimento());
				$query->bindValue(':desdobramento', $this->getDesdobramentoAtendimento());
				$query->execute();
				$nr = $query->rowCount();
				$pdo = $conexao->encerrar();
				return $nr;

			} catch (PDOException $e) {
				return 0;
				exit('Erro: ' . $e->getMessage());
			}
		}
		
		public function alterarAtendimento($codigoAtendimento) {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	UPDATE atendimento
											SET codigoAtendimento			= :cod,
												senhaAtendimento			= :senha,
												guicheAtendimento			= :guiche,
												dataAtendimento				= :data,							
												horaAtendimento				= :hora,
												codigoPaciente				= :paciente,
												convenioAtendimento			= :convenio, 
												desdobramentoAtendimento	= :desdobramento
											WHERE codigoAtendimento			= :codigo;");
				$query->bindValue(':cod', $this->getCodigoAtendimento());
				$query->bindValue(':senha', $this->getSenhaAtendimento());
				$query->bindValue(':guiche', $this->getGuicheAtendimento());
				$query->bindValue(':data', $this->getDataAtendimento());
				$query->bindValue(':hora', $this->getHoraAtendimento());
				$query->bindValue(':paciente', $this->getCodigoPaciente());
				$query->bindValue(':convenio', $this->getConvenioAtendimento());
				$query->bindValue(':desdobramento', $this->getDesdobramentoAtendimento());
				$query->bindValue(':codigo', $codigoAtendimento);
				$query->execute();
				$nr = $query->rowCount();
				$pdo = $conexao->encerrar();
				return $nr;

			} catch (PDOException $e) {
				return 0;
				exit('Erro: ' . $e->getMessage());
			}
		}
		
		public function excluirAtendimento($codigoAtendimento) {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	DELETE
											FROM 	atendimento
											WHERE 	codigoAtendimento = :codigo;");
				$query->bindValue(':codigo', $codigoAtendimento);
				$query->execute();
				$nr = $query->rowCount();
				$pdo = $conexao->encerrar();
				return $nr;

			} catch (PDOException $e) {
				return 0;
				exit('Erro: ' . $e->getMessage());
			}
		}
		
		public function listarAtendimento() {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	SELECT	codigoAtendimento, 
													senhaAtendimento, 
													guicheAtendimento, 
													dataAtendimento, 
													horaAtendimento, 
													nomePaciente, 
													convenioAtendimento, 
													desdobramentoAtendimento
											FROM	atendimento NATURAL JOIN paciente
											ORDER BY codigoAtendimento DESC");
				$query->execute();
				$atendimentos	= $query->fetchAll();
				$pdo = $conexao->encerrar();
				return $atendimentos;

			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
		}
		
		public function senhaAtendimento(){
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	SELECT senhaAtendimento
											FROM atendimento
											WHERE codigoAtendimento = (	SELECT MAX(codigoAtendimento)
																		FROM atendimento);");
				
				$query->execute();
				$res	=	$query->fetchObject();			
				$pdo = $conexao->encerrar();

				return $res->senhaAtendimento+1;

			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
		}

		public function buscarCodigo() {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	SELECT	codigoAtendimento
											FROM	atendimento
											WHERE	codigoAtendimento = (	SELECT MAX(codigoAtendimento)
																						FROM atendimento);");
				$query->execute();
				$res = $query->fetchObject();
	
				return $res->codigoAtendimento;
			
			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
		}

		public function ultimaChamada() {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	SELECT	senhaAtendimento,
													guicheAtendimento,
													dataAtendimento,
													horaAtendimento
											FROM	atendimento
											WHERE	codigoAtendimento = (	SELECT MAX(codigoAtendimento)
																			FROM atendimento);");
				$query->execute();
				$res = $query->fetch();
				return $res;
			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
		}

		public function ultimasChamadas() {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	SELECT	senhaAtendimento, 
													guicheAtendimento
											FROM	atendimento
											ORDER BY codigoAtendimento DESC
											LIMIT	3");
				$query->execute();
				$atendimentos	= $query->fetchAll();
				$pdo = $conexao->encerrar();
				return $atendimentos;
			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
		}

		public function localizarAtendimento($codigoAtendimento) {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	SELECT	codigoAtendimento,
													senhaAtendimento,
													guicheAtendimento,
													dataAtendimento,
													horaAtendimento,
													codigoPaciente, 
													convenioAtendimento,
													desdobramentoAtendimento
											FROM	atendimento
											WHERE	codigoAtendimento = :codigo;");
				$query->bindValue(':codigo', $codigoAtendimento);
				$query->execute();
				$nr = $query->rowCount();

				if($nr === 1) {
					$row = $query->fetch(PDO::FETCH_ASSOC);
					$this->setCodigoAtendimento($row['codigoAtendimento']);
					$this->setSenhaAtendimento($row['senhaAtendimento']);
					$this->setGuicheAtendimento($row['guicheAtendimento']);
					$this->setDataAtendimento($row['dataAtendimento']);
					$this->setHoraAtendimento($row['horaAtendimento']);
					$this->setCodigoPaciente($row['codigoPaciente']);
					$this->setConvenioAtendimento($row['convenioAtendimento']);
					$this->setDesdobramentoAtendimento($row['desdobramentoAtendimento']);
					$pdo = $conexao->encerrar();
					return true;
				} else {
					$pdo = $conexao->encerrar();
					return false;
				}
			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
		}

		public function listarHorarios() {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	SELECT	dataAtendimento, 
													horaAtendimento,
													guicheAtendimento
											FROM	atendimento");
				$query->execute();
				$atendimentos	= $query->fetchAll();
				$pdo = $conexao->encerrar();
				$horarios = array();
				foreach ($atendimentos as $atendimento) {
					$hora = $atendimento['horaAtendimento'][0] . $atendimento['horaAtendimento'][1];
					$minuto = $atendimento['horaAtendimento'][3] . $atendimento['horaAtendimento'][4];
					$horario = $hora . ':' . $minuto;
					array_push($horarios, array($atendimento['dataAtendimento'], $horario, $atendimento['guicheAtendimento']));
				}
				return $horarios;
			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
		}

		function listarGuichePorHorarios(array $arr) {
			$ocorrenciasGuicheHorario = [] ;
			array_walk( $arr, function($value, $key) use (&$ocorrenciasGuicheHorario) {
			   @ $ocorrenciasGuicheHorario[$value[0]][$value[1]][$value[2]]++;
			});
			return $ocorrenciasGuicheHorario;
		}  
		
	}
?>