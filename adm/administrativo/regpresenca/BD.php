<?php
	class BD{
		public function ouvintesPagos($palestra){
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = "SELECT nome, id, ra FROM palestrass WHERE palestra like '".$palestra."' and ano like '%2016%' AND semestre like '%1sem%' AND pago like '%1%' group BY  nome";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}	
		}
	
		//seleciona todas as palestras
		public function selecionaPalestras(){
			$config = require '../../../cfg/config.php';
			//header("Content-Type: text/html; charset=UTF-8", true);
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
			//header("Content-Type: text/html; charset=UTF-8", true);
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "SELECT DISTINCT nome FROM palestrass WHERE palestra='{$palestra}' AND ano like '2016' 
																						  AND semestre like '1sem' 
																						  AND presenca = 0 order by nome";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//seleciona alunos cadastrados nas palestras
		public function registraPresenca($ra,$palestra){
			$config = require '../../../cfg/config.php';
			//header("Content-Type: text/html; charset=UTF-8", true);
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "UPDATE palestrass SET presenca = 1 WHERE ra like '$ra' AND palestra like '$palestra'";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
	}
?>