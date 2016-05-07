<?php
	class BD{		
		//seleciona todas as palestras
		public function selecionaPalestras(){
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "SELECT * FROM palestraa WHERE ano like '%2016%' AND semestre like '%1sem%'";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//seleciona alunos cadastrados nas palestras
		public function selecionaAlunos($palestra){
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "SELECT DISTINCT nome FROM palestrass WHERE pago=1 AND palestra='{$palestra}' AND ano like '%2016%' AND semestre like '%1sem%' order by nome";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
	}
?>