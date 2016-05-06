<?php $config = require '../cfg/config.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8"/>
<title>EventSIS</title></head>

<body>  
	<?php
	// Estabelecendo a conexão com o banco de dados
	try{
		$link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT autor, pago, tipo FROM pagamentos p order by autor";
		echo '<p align="center" size="10"><b>';
		echo ' <b>Lista de Alunos</b></p>';
		echo '<table style="width:50%" align="center" border="1">';
		echo '<tr><td>AUTOR</td><td>TIPO</td><td>PAGO</td></tr>';
		
		foreach($link->query($sql) as $row){
			$nome = strtoupper($row['autor']);
		echo '<tr><td>' . $nome . '</td><td>' . $row['tipo'].'</td>';
		if($row['pago']=='1'){
			echo '<td>SIM</td>';
		}else{
			echo '<td>' . 'NÃO' . '</td></tr>';
		}
		}
		echo '</table>';
		
	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
	?>	    
</body>
</html>
