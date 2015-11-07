<?php
		$id = $_POST['id'];
		$status = $_POST['status'];
		$comentarios = $_POST['comentarios'];
		
	try{
		$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "UPDATE evento SET status='$status', comentarios='$comentarios' WHERE id ='$id'";
		$link->query($sql);

		header("Location: final.html");

	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>
