<?php
	
	header("Content-Type: text/html; charset=utf-8", true);
	class BD{
		public function ouvintesPagos(){
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = "SELECT nome, id, ra FROM palestrass WHERE ano like '%2016%' AND semestre like '%1sem%' AND pago like '%1%' group BY  nome";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}	
		}
	}
?>