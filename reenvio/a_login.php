<?php
	session_start();
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['comentarios'];
?>

<?php
	$email = $_SESSION['email'];
	$senha = $_SESSION['password'];
	//Caso algum professor não tenha comentado, mas aluno deseja alterar o resumo
	
	try{
		$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT comentarios FROM evento where email = '$email'";
		$comentarios = "Professor avaliador, por favor anote as alterações para o autor aqui.";
	//Professor fez comentário				
		foreach($link->query($sql) as $row){
			if(strcmp($row['comentarios'],$comentarios)==0){
				$_SESSION['comentarios'] = "Modo Edição do aluno";
			}else{
			$_SESSION['comentarios'] = $row['comentarios'];
			}
		}
					
	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}

	// Estabelecendo a conexão com o banco de dados

	try{
		$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
		$sql = "SELECT email, senha FROM evento WHERE email = '$email'";
					
		foreach($link->query($sql) as $row){
		}				
	//Se achou vai para modo de edição, se não, volta para login
		if($row['senha']==$senha){
			header('Location:ed_resumo.php');
		}else{
			header('Location:index.html');
		}
					
	}catch(PDOException $e){
		echo "ERROR";
	}
?>
