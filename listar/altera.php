<?php 
	$config = require '../cfg/config.php'; 
	include_once('../utils/common.php'); 
	try{
		$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
		$sql = "select nome, titulo from evento";		
		foreach($link->query($sql) as $row){
			$str1 = $row['nome'];
			$str2 = $row['titulo'];
			$str1 = strtoupper(iconv('UTF-8', 'ASCII//TRANSLIT', $str1)); 
			$str2 = strtoupper(iconv('UTF-8', 'ASCII//TRANSLIT', $str2)); 
			$str3 = "%".$row['nome']."%";
			$sqlAtualiza = 'UPDATE evento SET nome ="$str1", titulo = "$str2" WHERE nome like "$str3"';
			$link->query($sqlAtualiza);
		}
		header("Location:index.php");
	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>



