<?php 
	$config = require '../../../cfg/config.php';
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	
	class BD{
		//listar certificado aluno participante
		public buscaCerticiadoP(){
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "SELECT Distinct e.nome, e.titulo, e.tipo, e.curso FROM pagamentos p, eventos e WHERE p.pago='1'
																						AND e.email like '%{$session->get('email')}%'
																						AND e.semestre like '%1sem%'
																						AND e.ano like '%2016%'";
				foreach($pdo->query($sql) as $row){
					$session->set('nome',$row['nome']);
					$session->set('titulo',$row['titulo']);
					$session->set('tipo',$row['tipo']);
					$session->set('curso',$row['curso']);
				}			
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
			}
		}
		//buca aluno ouvinte
		public buscaAlunoO(){
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "SELECT DISTINCT nome FROM palestrass WHERE ra LIKE '%{$ra}%' AND pago LIKE '%1%' 
																		AND presenca like '%1%' 
																		AND semestre like '%1sem%'
																		AND ano like '%2016%'";
				foreach($pdo->query($sql) as $row){
					$session->set('nome',$row['nome']);
				}			
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
			}
		}
		//busca palestra ouvintes
		public buscaPalestraO(){
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
				$sql = "SELECT palestra FROM palestrass WHERE ra LIKE '%{$ra}%' AND pago LIKE '%1%' 
																		AND presenca like '%1%' 
																		AND semestre like '%1sem%'
																		AND ano like '%2016%'
																		order by palestra";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
			}
		}		
	}