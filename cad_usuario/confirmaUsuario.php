<?php $config = require '../cfg/config.php'; ?>
<?php
		session_start();
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['nome'] = $_POST['nome'];
		$_SESSION['tipo'] = $_POST['tipo'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$tipo = $_POST['tipo'];
		$password = $_POST['password'];
		
	// Estabelecendo a conexão com o banco de dados
	try{
		$nome = strtoupper($nome);
		$tipo = strtoupper($tipo);

		$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "INSERT INTO evento (nome, email, tipo, senha) values ('$nome', '$email', '$tipo', '$password');";
		$link->query($sql);

		header("Location:cad_resumo.php");

	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>