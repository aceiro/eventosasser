<?php
	class BD{
		
		//insere palestra no banco de dados
		public function gravaPalestra($palestrante,$palestra,$dia,$horario){
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "INSERT INTO palestraa (palestrante,palestra,dia,horario,ano, semestre)values('$palestrante','$palestra','$dia','$horario','2016','1sem')";
				$pdo->query($sql);

				header("Location: listar.php");

			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//listar todas as palestras do ano por semestre
		public function listar(){
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "SELECT * FROM palestraa WHERE ano like '%2016%' AND semestre like '%1sem%' ORDER BY dia";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}			
		}
		
	}
?>