<?php
		$palestrante = $_POST['palestrante'];
		$palestra = $_POST['palestra'];
		$dia = $_POST['dia'];
		$horario = $_POST['horario'];
		
	// Estabelecendo a conexão com o banco de dados
	try{
		$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "INSERT INTO palestra (palestrante,palestra,dia,horario)values('$palestrante','$palestra','$dia','$horario')";
		$link->query($sql);

		header("Location: ./");

	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>