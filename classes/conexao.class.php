<?php ob_start();
	require_once('config.php');
	class Conexao {
		
		private  $server = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8';
		private  $user = DBUSER;
		private  $pass = DBPWD;
		private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
		protected $con;
 
        public function conectar() {
            try {
          		$this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
          		return $this->con;
            } catch (PDOException $e) {
                echo "Erro ao conectar-se ao banco de dados: " . $e->getMessage();
            }
		}
		
		public function encerrar() {
			$this->con = null;
		}
	}

?>
