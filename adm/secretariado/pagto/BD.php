<?php
	header("Content-Type: text/html; charset=UTF-8", true);
		
	class BD{
		//seleciona todos os registros
		public function selecionaTudo(){
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = 'SELECT titulo, codigo, autor, tipo, pago FROM pagamentos WHERE ano like "%2016%" AND semestre like "%1sem%" order by autor';
				return $pdo->query($sql);
				
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
		}
		//seleciona uma inscrição pelo código
		public function retornaUmaInsc($codigo){	
			$config = require '../../../cfg/config.php';
			require_once("../../../cfg/Session.php");
			$session = new Session("EventosAsser2016");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "SELECT * FROM pagamentos WHERE codigo='$codigo'";
				foreach($pdo->query($sql) as $row){
					$session->set('autor',$row['autor']);
					$session->set('titulo',$row['titulo']);
					$session->set('tipo',$row['tipo']);
				}							
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//atualiza dados da inscrição
		public function atualizaInsc(){
			require_once("../../../cfg/Session.php");
			$session = new Session("EventosAsser2016");
			$config = require '../../../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$titulo = $session->get('titulo');
				
				$sql = "UPDATE pagamentos SET pago='1' WHERE titulo like '%{$titulo}%' AND ano like '%2016%' AND semestre like '%1sem%'";
		
				$pdo->query($sql);

			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
	}
?>