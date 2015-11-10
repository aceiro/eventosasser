<?php $config = require '../cfg/config.php'; ?>
<?php
	session_start();

	$email = $_SESSION['email'];
	$titulo = strtoupper($_POST['titulo']);	
	$curso = strtoupper($_POST['curso']);
	$orientador = $_POST['orientador'];
	$autores = $_POST['autores'];
	$resumo = $_POST['resumo'];
	$keyword = strtoupper($_POST['keyword']);
	$status = '0';
	$comentarios = 'Professor avaliador, por favor anote as alterações para o autor aqui.';
		
	// Estabelecendo a conexão com o banco de dados
	try{
		$comentarios = strtoupper($comentarios);
		$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "UPDATE evento SET titulo='$titulo', curso='$curso', orientador='$orientador', autores='$autores', resumo='$resumo', keyword='$keyword', status='$status', comentarios='$comentarios' WHERE email ='$email'";
		$link->query($sql);

		header("Location:final.php");

	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>