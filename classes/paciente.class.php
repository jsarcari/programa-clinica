<?php ob_start();
	include_once("classes/conexao.class.php");

	class Paciente {
		private $codigoPaciente;
		private $nomePaciente;
		private $sexoPaciente;
		private $nascimentoPaciente;
		private $responsavelPaciente;
		private $dddResponsavel;
		private $telefoneResponsavel;
		
		public function __construct($codigoPaciente,$nomePaciente,$sexoPaciente,$nascimentoPaciente,$responsavelPaciente,$dddResponsavel,$telefoneResponsavel){
			$this->codigoPaciente 		= $codigoPaciente;
			$this->nomePaciente 		= $nomePaciente;
			$this->sexoPaciente			= $sexoPaciente;
			$this->nascimentoPaciente	= $nascimentoPaciente;
			$this->responsavelPaciente	= $responsavelPaciente;
			$this->dddResponsavel		= $dddResponsavel;
			$this->telefoneResponsavel	= $telefoneResponsavel;
		}
		
		public function getCodigoPaciente() {
		return $this->codigoPaciente;
		}
		
		public function getNomePaciente() {
		return $this->nomePaciente;
		}
		
		public function getSexoPaciente() {
		return $this->sexoPaciente;
		}
		
		public function getNascimentoPaciente() {
		return $this->nascimentoPaciente;
		}
		
		public function getResponsavelPaciente() {
		return $this->responsavelPaciente;
		}
		
		public function getDddResponsavel(){
		return $this->dddResponsavel;
		}
		
		public function getTelefoneResponsavel(){
		return $this->telefoneResponsavel;
		}
		
		public function setCodigoPaciente($codigoPaciente) {
		$this->codigoPaciente = $codigoPaciente;
		}
		
		public function setNomePaciente($nomePaciente) {
		$this->nomePaciente = $nomePaciente;
		}
		
		public function setSexoPaciente($sexoPaciente) {
		$this->sexoPaciente = $sexoPaciente;
		}
		
		public function setNascimentoPaciente($nascimentoPaciente) {
		$this->nascimentoPaciente = $nascimentoPaciente;
		}
		
		public function setResponsavelPaciente($responsavelPaciente){
		$this->responsavelPaciente = $responsavelPaciente;
		}
		
		public function setDddResponsavel($dddResponsavel) {
		$this->dddResponsavel = $dddResponsavel;
		}
		
		public function setTelefoneResponsavel($telefoneResponsavel){
		$this->telefoneResponsavel = $telefoneResponsavel;
		}
		
		public function converteData($nascimentoPaciente){

			$nascimentoPaciente = "$nascimentoPaciente[6]"."$nascimentoPaciente[7]"."$nascimentoPaciente[8]"."$nascimentoPaciente[9]"."$nascimentoPaciente[5]"."$nascimentoPaciente[3]"."$nascimentoPaciente[4]"."$nascimentoPaciente[2]"."$nascimentoPaciente[0]"."$nascimentoPaciente[1]";
		
			return $nascimentoPaciente;
		}

		public function incluirPaciente(){
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	INSERT INTO paciente ( 
														nomePaciente,
														sexoPaciente,
														nascimentoPaciente,
														responsavelPaciente,
														dddResponsavel,
														telefoneResponsavel) 
												VALUES (:nome, 
														:sexo, 
														:data,
														:responsavel,
														:ddd,
														:telefone);");
				$query->bindValue(':nome', $this->getNomePaciente());
				$query->bindValue(':sexo', $this->getSexoPaciente());
				$query->bindValue(':data', $this->converteData($this->getNascimentoPaciente()));
				$query->bindValue(':responsavel', $this->getResponsavelPaciente());
				$query->bindValue(':ddd', $this->getDddResponsavel());
				$query->bindValue(':telefone', $this->getTelefoneResponsavel());
				$query->execute();
				$nr = $query->rowCount();
				$pdo = $conexao->encerrar();
				return $nr;

			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
		}		
		
		public function alterarPaciente($codigoPaciente) {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	UPDATE paciente
											SET codigoPaciente				= :cod,
												nomePaciente				= :nome,
												sexoPaciente				= :sexo,							
												nascimentoPaciente			= :data,
												responsavelPaciente			= :responsavel,
												dddResponsavel				= :ddd, 
												telefoneResponsavel			= :telefone
											WHERE codigoPaciente			= :codigo;");
				$query->bindValue(':cod', $this->getCodigoPaciente());
				$query->bindValue(':nome', $this->getNomePaciente());
				$query->bindValue(':sexo', $this->getSexoPaciente());
				$query->bindValue(':data', $this->converteData($this->getNascimentoPaciente()));
				$query->bindValue(':responsavel', $this->getResponsavelPaciente());
				$query->bindValue(':ddd', $this->getDddResponsavel());
				$query->bindValue(':telefone', $this->getTelefoneResponsavel());
				$query->bindValue(':codigo', $codigoPaciente);
				$query->execute();
				$nr = $query->rowCount();
				$pdo = $conexao->encerrar();
				return $nr;
			
			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
						
		}
	
		public function excluirPaciente($codigoPaciente) {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	DELETE
											FROM paciente
											WHERE codigoPaciente = :codigo;");
				$query->bindValue(':codigo', $codigoPaciente);
				$query->execute();
				$nr = $query->rowCount();
				$pdo = $conexao->encerrar();
				return $nr;

			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
		}

		public function listarPaciente() {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query	= $pdo->prepare("	SELECT	codigoPaciente,
													nomePaciente,
													sexoPaciente,
													nascimentoPaciente,
													responsavelPaciente,
													dddResponsavel, 
													telefoneResponsavel
											FROM	paciente
											ORDER BY	codigoPaciente");
				$query->execute();
				$pacientes	= $query->fetchAll();
				$pdo = $conexao->encerrar();
				return $pacientes;
				
			} catch (PDOException $e) {
				exit('Erro: ' . $e->getMessage());
			}
						
		}
			
		public function localizarPaciente($codigoPaciente) {
			try {
				$conexao = new Conexao();
				$pdo = $conexao->conectar();
				$query = $pdo->prepare("	SELECT	codigoPaciente,
													nomePaciente,
													sexoPaciente,
													nascimentoPaciente,
													responsavelPaciente,
													dddResponsavel, 
													telefoneResponsavel
											FROM	paciente
											WHERE	codigoPaciente = :codigo;");
				$query->bindValue(':codigo', $codigoPaciente);
				$query->execute();
				$nr = $query->rowCount();

				if($nr === 1) {
					$row = $query->fetch(PDO::FETCH_ASSOC);
					$this->setCodigoPaciente($row['codigoPaciente']);
					$this->setNomePaciente($row['nomePaciente']);
					$this->setSexoPaciente($row['sexoPaciente']);
					$this->setNascimentoPaciente($row['nascimentoPaciente']);
					$this->setResponsavelPaciente($row['responsavelPaciente']);
					$this->setDddResponsavel($row['dddResponsavel']);
					$this->setTelefoneResponsavel($row['telefoneResponsavel']);
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
	}
?>