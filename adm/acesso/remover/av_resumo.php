<?php $config = require '../../../cfg/config.php';
	$id = $_POST['id'];
	try{
        $link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		$sql = "DELETE FROM evento WHERE id='$id'";
		header('Location: final.php');
	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>
