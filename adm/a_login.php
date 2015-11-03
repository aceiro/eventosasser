<?php
	session_start();
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['password'] = $_POST['password'];
?>

<?php
	$login = $_SESSION['login'];
	$senha = $_SESSION['password'];
	//Caso algum professor não tenha comentado, mas aluno deseja alterar o resumo
	
	try{
		$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT login, senha FROM adm where login = '$login'";
	//Professor fez comentário				
		foreach($link->query($sql) as $row){
			if(strcmp($row['login'],$login)==0){
				if(strcmp($row['senha'],$senha)==0){
					header("Location:acesso");
			}else{
				header("Location:./");
			}
		}
		}			
	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>
