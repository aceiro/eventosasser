<?php
	require_once("../../cfg/Session.php");
	$config = require '../../cfg/config.php';
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../../utils/common.php');
	
    if(!isset($session->get('login'))){
       header('Location: ../../');
       die();
    }
	
	$str1;
	$str2;
		
	// Estabelecendo a conexão com o banco de dados
	try{
		$nome = strtoupper($nome);
		$tipo = strtoupper($tipo);

		$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "select nome, titulo evento";
		
		foreach($link->query($sql) as $row){
			$str1 = $row['nome'];
			$str2 = $row['titulo'];
			$str1 = strtoupper(iconv('UTF-8', 'ASCII//TRANSLIT', $str1)); 
			$str2 = strtoupper(iconv('UTF-8', 'ASCII//TRANSLIT', $str2)); 
			$sqlAtualiza = "UPDATE evento SET nome =".$str1.", titulo = ".$str2." WHERE nome =".$row['nome'];
			$link->query($sqlAtualiza);
		}
		header("Location:../../listar");

	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>



