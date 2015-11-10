<?php $config = require '../cfg/config.php'; ?>
<?php
	session_start();
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['password'] = $_POST['password'];

	$login = $_SESSION['login'];
	$senha = $_SESSION['password'];
	
	try{
		$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT login, senha FROM adm where login = '$login'";
		
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
