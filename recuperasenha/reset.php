<?php
	$username = 'root';
	$password = '';
	
	try{
			$conn = new PDO("mysql:host=localhost;dbname=eventosa_v1", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$ps = $conn->prepare("update participante set senha = :senha where email = :email");
												
				$ps->execute(array(
					'email' => addslashes($_POST['email']),
					'senha' => addslashes($_POST['senha'])
				));
				
			header("location:finaliza.html");
	}
	catch(PDOException $e){
		echo '<center>Erro ao conectar com o banco: ' . $e->getMessage();
	}
?>