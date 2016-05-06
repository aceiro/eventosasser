<?php 
	header("Content-Type: text/html; charset=UTF-8", true);
	class BD{
		
		public function devolveLista(){
			$config = require '../../cfg/config.php';
			
			try{
                $pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'SELECT DISTINCT  * FROM eventos WHERE titulo <> \'\' AND  titulo IS NOT NULL AND
                                                                 nome   <> \'\' AND  nome IS NOT NULL AND
                                                                 curso  <> \'\' AND  curso IS NOT NULL AND
																 ano like "%2016%" AND
																 semestre like "%1sem%"
                                                           ORDER BY curso';
				return $pdo->query($sql);
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		
		public function devolveUm($id){
			$config = require '../../cfg/config.php';
			require_once("../../cfg/Session.php");
			$session = new Session('EventosAsser2016');
			
			try{
                $pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "SELECT * FROM eventos WHERE id='{$session->get('id')}'";
				return $pdo->query($sql);
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		
		public function gravaAlteracao($status,$comentarios,$id){
			$config = require '../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
				$sql = 'UPDATE eventos SET status="' . $status . '", comentarios="' . $comentarios . '" WHERE id = ' . $id . ';';
				$pdo->query($sql);

				header("Location: final.html");

			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}	
		
		public function checkUsuario($login){
			$config = require_once("../../cfg/config.php");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "SELECT COUNT(*) FROM adm where login like '%{$login}%'";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$num = $stmt->fetchColumn();
			
				if($num == 0){
						header("Location: ../");	
					}		
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
	}