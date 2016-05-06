<?php 
	
	require_once("../cfg/Session.php");	
	header("Content-Type: text/html; charset=UTF-8", true);
	
	class BD{
		
		public function gravaResumo(){
			$config = require '../cfg/config.php';
			$session = new Session("EventosAsser2016");
				// Estabelecendo a conexão com o banco de dados
				
			try{
				$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//insere resumo no evento	
			
				$stmt = $pdo->prepare('INSERT INTO eventos (nome,email,password,tipo,titulo,curso,orientador,autores,resumo,keyword,status,comentarios,ano,semestre) 
										VALUES (:nome,:email,:password,:tipo,:titulo,:curso,:orientador,:autores,:resumo,:keyword,:status,:comentarios,"2016","1sem")');
				$stmt->execute(array(
					':nome' => $session->get("autor"),
					':email' => $session->get("login"),
					':password' => $session->get("password"),
					':tipo' => $session->get("tipo"),
					':titulo' => $session->get("titulo"),
					':curso' => $session->get("curso"),
					':orientador' => $session->get("orientador"),
					':autores' => $session->get("autores"),
					':resumo' => $session->get("resumo"),
					':keyword' => $session->get("keyword"),
					':status' => $session->get("status"),
					':comentarios' => $session->get("comentarios")
				));
			//insere autor1 no pagamento
				$stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
				$stmt->execute(array(
					'titulo' => $session->get("titulo"),
					'autor' => $session->get("autor1"),
					'tipo' => $session->get("tipo"),
					'pago' => 0,
					':email' => $session->get("email1")
				));
			//insere autor2 no pagamento		
				if(strcmp($session->get("autor2"),"")!=0){
					$stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
					$stmt->execute(array(
						'titulo' => $session->get("titulo"),
						'autor' => $session->get("autor2"),
						'tipo' => $session->get("tipo"),
						'pago' => 0,
						':email' => $session->get("email2")
					));
				}
			//insere autor3 no pagamento		
				if(strcmp($session->get("autor3"),"")!=0){
					$stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
					$stmt->execute(array(
						'titulo' => $session->get("titulo"),
						'autor' => $session->get("autor3"),
						'tipo' => $session->get("tipo"),
						'pago' => 0,
						':email' => $session->get("email3")
					));
				}
			//insere autor4 no pagamento		
				if(strcmp($session->get("autor4"),"")!=0){
					$stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
					$stmt->execute(array(
						'titulo' => $session->get("titulo"),
						'autor' => $session->get("autor4"),
						'tipo' => $session->get("tipo"),
						'pago' => 0,
						':email' => $session->get("email4")
					));
				}
			//insere autor5 no pagamento		
				if(strcmp($session->get("autor5"),"")!=0){
					$stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
					$stmt->execute(array(
						'titulo' => $session->get("titulo"),
						'autor' => $session->get("autor5"),
						'tipo' => $session->get("tipo"),
						'pago' => 0,
						':email' => $session->get("email5")
					));
				}
			//adicionar aqui inserção de vetor com mais autores??
				if(strcmp($session->get("autorplus"),"")!=0){
					$cont = 0;
					$autorplus = $session->get("autorplus");
					$emailplus = $session->get("emailplus");
					foreach($autorplus as $nome){
						$stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
						$stmt->execute(array(
							'titulo' => $session->get("titulo"),
							'autor' => $nome,
							'tipo' => $session->get("tipo"),
							'pago' => 0,
							':email' => $emailplus[$cont]
						));
						$cont++;
					}
				}
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}

	}