<?php 	
	require_once("../cfg/Session.php");
	header("Content-Type: text/html; charset=UTF-8", true);
	
	class BD{
		//listar trabalhos do evento
		
		public function listar(){
			$config = require '../cfg/config.php';
			
			try{
                $pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT DISTINCT  * FROM eventos WHERE titulo <> \"\" AND  titulo IS NOT NULL AND
                                                                 nome   <> \"\" AND  nome IS NOT NULL AND
                                                                 curso  <> \"\" AND  curso IS NOT NULL AND
																 ano like '%2016%' AND
																 semestre like '%1sem%'
                                                           ORDER BY curso";
				return $pdo->query($sql);
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//listar palestras para seleção do aluno
		public function listarPalestras(){
			$config = require '../cfg/config.php';
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "SELECT * FROM palestraa WHERE ano like '%2016%' AND semestre like '%1sem%'";
				return $pdo->query($sql);
			
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
			}			
		}
		//listar palestras em que o aluno se cadastrou
		public function listaPalestrasRa(){
			$config = require '../cfg/config.php';
			$session = new Session("EventosAsser2016");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "SELECT * FROM palestrass WHERE ra like '%" . $session->get('ra') . "%' AND ano like '%2016%' AND semestre like '%1sem%'";
				return $pdo->query($sql);
			
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
			}			
		}
		//insere aluno em uma palestra, primeiro verifica se já cadastrado em uma palestra, caso não insere novo
		public function cadastrarAlunoPalestra(){
			$config = require '../cfg/config.php';
			$session = new Session("EventosAsser2016");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "INSERT INTO palestrass (ra,nome,palestra,pago,presenca,ano,semestre) VALUES ('{$session->get('ra')}','{$session->get('nome')}','{$session->get('palestra')}','0',0,'2016','1sem')";
				$pdo->query($sql);
				
				$sql = "SELECT * FROM palestrass WHERE ra like '%{$session->get('ra')}%'";
				return $pdo->query($sql);				
			
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
			}
		}
		//seleciona resumo para reenvio
		public function selecionaResumo(){
			$config = require '../cfg/config.php';
			$session = new Session("EventosAsser2016");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "SELECT comentarios, titulo, curso, orientador, autores, resumo, keyword, password FROM eventos WHERE email like '%{$session->get('email')}%' AND ano like '2016' AND semestre like '1sem'";
				return $pdo->query($sql); 
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
				//seleciona resumo para reenvio
		public function selecionaUmResumo(){
			$config = require '../cfg/config.php';
			$session = new Session("EventosAsser2016");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "SELECT nome, comentarios, titulo, curso, orientador, autores, resumo, keyword FROM eventos WHERE email like '{$session->get('r_email')}' AND ano like '2016' AND semestre like '1sem'";
				foreach($pdo->query($sql) as $row){
					$session->set('comentarios',$row['comentarios']);
					$session->set('nome',$row['nome']);
					$session->set('titulo',$row['titulo']);
					$session->set('curso',$row['curso']);
					$session->set('orientador',$row['orientador']);
					$session->set('autores',$row['autores']);
					$session->set('resumo',$row['resumo']);
					$session->set('keyword',$row['keyword']);
				}
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//reenvio do resumo
		public function reenviar(){
			$config = require '../cfg/config.php';
			$session = new Session("EventosAsser2016");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
				$sql = "UPDATE eventos SET titulo = '{$session->get('titulo')}', nome='{$session->get('nome')}', 
							curso='{$session->get('curso')}', orientador='{$session->get('orientador')}', 
							autores='{$session->get('autores')}', resumo='{$session->get('resumo')}', 
							keyword = '{$session->get('keyword')}', status = 0 WHERE email like '{$session->get('r_email')}' 
							AND semestre like '%1sem%' AND ano like '%2016%'";
				$pdo->query($sql);

			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		
		public function selecionarCursos(){
			$config = require '../cfg/config.php';
			$session = new Session("EventosAsser2016");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "SELECT DISTINCT  * FROM eventos WHERE curso like '%{$session->get('curso')}%' AND
															 status like '%1%' AND
															 ano like '%2016%' AND
															 semestre like '%1sem%'
													   ORDER BY tipo";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		
		public function geraRa(){
			$config = require '../cfg/config.php';
			$session = new Session("EventosAsser2016");
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "SELECT COUNT(*) FROM palestrass WHERE ra like '%{$session->get('ra')}%'";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
	}