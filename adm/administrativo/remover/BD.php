<?php
	class BD{
		
		header("Content-Type: text/html; charset=UTF-8", true);	
		$config = require '../../../cfg/config.php';
		//seleciona todos os resumos
		public selecionaResumos(){
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = 'SELECT * FROM eventos order by curso';
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//remoção de resumo conforme pedido do aluno
		public removeResumo($id){
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "DELETE FROM eventos WHERE id='$id'";
				$pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
	}
?>