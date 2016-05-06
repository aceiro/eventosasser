<?php
	class BD{
		//seleciona todos
		public function listar(){
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "SELECT * FROM palestrass WHERE semestre like '%1sem%' order by nome";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//seleciona pelo ra
		public function selecionaRa(){
			$config = require '../../../cfg/config.php';
			require_once("../../../cfg/Session.php");
			$session = new Session("EventosAsser2016");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "SELECT * FROM palestrass WHERE semestre like '%1sem%' AND ra like '%{$session->get('ra')}%' AND ano like '%2016%'";
				foreach($pdo->query($sql) as $row){
					$session->set('nome',$row['nome']);
					$session->set('ra',$row['ra']);
				}								
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//grava pagamento
		public function gravaPagamento($ra,$pago){
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "UPDATE palestrass SET pago='1' WHERE ra like '%{$ra}%'";
				$pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
	}
?>