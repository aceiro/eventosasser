<?php
	require_once("../cfg/Session.php");	
	header("Content-Type: text/html; charset=UTF-8", true);

class BD{
	
	public function check($login, $password){
		$session = new Session("EventosAsser2016");
		$config = require_once("../cfg/config.php");
		try{
			$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = "SELECT COUNT(*) FROM adm where login like '%{$session->get('login')}%'";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$num = $stmt->fetchColumn();
			
				if($num == 0){
						header("Location: ./");	
					}
		
			$sql = "SELECT login, senha FROM adm where login like '%{$session->get('login')}%'";
		
			foreach($pdo->query($sql) as $row){
				if(strcmp($row['login'],$session->get('login'))==0){
					if(strcmp($row['senha'],$session->get('password'))==0){
						if(strcmp($session->get('funcao'),"secretariado")==0){
							header("Location: secretariado");
						}
						if(strcmp($session->get('funcao'),"professor")==0){
							header("Location: professor");
						}
						if(strcmp($session->get('funcao'),"administrativo")==0){
							header("Location: administrativo");
						}
					}else{
						header("Location: ./");
					}
				}
			}		
		}catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
		}
	}	
}