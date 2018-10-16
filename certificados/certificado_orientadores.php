<?php 
	$config = require '../cfg/config.php';
	header("Content-Type: text/html; charset=UTF-8", true);
	try{
		$pdo = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		$sql = "SELECT DISTINCT e.nome, e.titulo, e.tipo, e.curso, e.orientador FROM pagamentos p, eventos e WHERE p.pago='1'";
		foreach($pdo->query($sql) as $row){
			echo $row['nome'] . ';' . $row['titulo'] .';' . $row['tipo'] . ';' . strtoupper($row['orientador']) . '; <br />';		
		}						
	}catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
	}
?>