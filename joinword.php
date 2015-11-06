<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=anais_2015.doc");
echo "<html>";
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo "<head>";
echo '<style type="text/css">';
echo 'h1 {	font-family: Arial;	font-size: 24px;	color: #000000;	text-align: center;}';
echo 'h2 {	font-family: Arial;	font-size: 12px;	color: #000000;	text-align: right;}';
echo 'h3 {	font-family: Arial;	font-size: 12px;	color: #000000;	text-align: justify;}';
echo '</style>';
echo "<body>";
try{
					$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
					$sql = 'SELECT * FROM evento where status = "1" order by curso';
					foreach($link->query($sql) as $row){
						echo "<h1>".strtoupper($row['titulo'])."</h1>";
						echo "<h2>".$row['autores']."</h2>";
						echo "<h2>".strtoupper($row['curso'])."</h2>";
						echo "<h2>".$row['orientador']."</h2>";
						echo "<h3>".$row['resumo']."</h3>";
						echo "<h3>Palavras-chave:".$row['keyword']."</h3>";
					}
					
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
				?>	



echo "</body>";
echo "</html>";
?>