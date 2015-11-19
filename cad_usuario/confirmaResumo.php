<?php $config = require '../cfg/config.php'; ?>
<?php
	session_start();

	function isEmpty($input)
	{
		$strTemp = $input;
		$strTemp = trim($strTemp); // trimming the string

		if( $strTemp == null       ||
		    $strTemp == ''         ||
		    strlen($strTemp) == 0  ) {
			return true;
		}
		return false;
	}
?>
<?php
		$titulo = $_POST['titulo'];	
		$curso = $_POST['curso'];
		$orientador = $_POST['orientador'];
		$autor1 = $_POST['autor1'];
		$email1 = $_SESSION['email'];
		$autor2 = $_POST['autor2'];
		$email2 = $_POST['email2'];
		$autor3 = $_POST['autor3'];
		$email3 = $_POST['email3'];
		$autor4 = $_POST['autor4'];
		$email4 = $_POST['email4'];
		$tipo = $_SESSION['tipo'];
		$autores = $autor1." - ".$email1;
		if(strcmp($autor2,"")!=0){
			$autores = $autores."; ".$autor2." - ".$email2;
		}
		if(strcmp($autor3,"")!=0){
			$autores = $autores."; ".$autor3." - ".$email3;
		}
		if(strcmp($autor4,"")!=0){
			$autores = $autores."; ".$autor4." - ".$email4;
		}
		$resumo = $_POST['resumo'];
		$keyword = $_POST['keyword'];
		$status = '0';
		$comentarios = 'Professor avaliador, por favor anote as alterações para o autor aqui.';

		// verifica se não está vazia as strings
		// senao faz um bypass
		if( isEmpty($titulo) || isEmpty($curso) || isEmpty($orientador) || isEmpty($resumo) || isEmpty($keyword) )
			return;


	// Estabelecendo a conexão com o banco de dados
	try{
		$titulo = strtoupper($titulo);	
		$curso  = strtoupper($curso);
		
		$comentarios = strtoupper($comentarios );

		$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "UPDATE evento SET titulo='$titulo', curso='$curso', 
		orientador='$orientador', autores='$autores', resumo='$resumo', 
		keyword='$keyword', status='$status', comentarios='$comentarios' WHERE email ='$email1'";

		$link->query($sql);
		
		$sql = "INSERT INTO pagamento (titulo,autor,tipo,pago,email) values
			('$titulo', '$autor1', '$tipo', 0, '$email1')";
		$link->query($sql);
		
		if(strcmp($autor2,"")!=0){
			$sql = "INSERT INTO pagamento (titulo,autor,tipo,pago,email) values('$titulo', '$autor2', '$tipo', 0, '$email2')";
			$link->query($sql);
			} 
		if(strcmp($autor3,"")!=0){
			$sql = "INSERT INTO pagamento (titulo,autor,tipo,pago,email) values('$titulo', '$autor3', '$tipo', 0, '$email3')";
			$link->query($sql);
			} 
		if(strcmp($autor4,"")!=0){
			$sql = "INSERT INTO pagamento (titulo,autor,tipo,pago,email) values('$titulo', '$autor4', '$tipo', 0, '$email4')";
			$link->query($sql);
			} 
		

		header("Location:confirma.php");

	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>