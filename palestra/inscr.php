<?php
	$ra = $_POST['ra'];
	$nome = $_POST['nome'];
	if($_POST['palestra']!=""){
		$palestra = $_POST['palestra'];
	}
	$meuhtml = "<!DOCTYPE html >
<html lang='pt-BR'>
<head>
<meta charset='utf-8' />
<title>Asser Eventos</title>
<link REL=StyleSheet HREF='../css/estilo.css' TYPE='text/css'></head>

<body>
	<div id='corpo'>
    	
        <div id='cabecalho'>
    	</div>
        
        <br />
        
        <div id='mmenu'>
		Palestras</div>
        
        <br />
        
        <div id='texto'>
    		<form id='cad_usuario' name='usuario' method='post' action='inscr.php' >

				<p align='center'><b>Escolha uma palestra</b></p>
				<p align='center'><select name='palestra' id='palestra'>";
//conexão com o banco de dados
		try{
			$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
//cadastra palestras
			if($_POST['palestra']!=""){
			  $sql = "INSERT INTO palestras (ra,nome,palestra) VALUES ('$ra','$nome','$palestra')";
			  $link->query($sql);
			}
//busca palestras cadastradas
			$sql = "SELECT * FROM palestras WHERE ra = '$ra'";
			$link->query($sql);

			foreach($link->query($sql) as $row){
				$meuhtml = $meuhtml."<p align='center'>".$row['palestra']."</p>";
				$nome = $row['nome'];
			}
			
			$sql = "SELECT * FROM palestra";
			$link->query($sql);

			foreach($link->query($sql) as $row){
				$concatena = $row['dia'].' '.$row['horario'].' '.$row['palestrante'].' '.$row['palestra'];
				$meuhtml = $meuhtml."<option value='$concatena'>$concatena</option>";
			}
			echo $meuhtml;
			$meuhtml = "</select></p>
				<p align='center'><input type='hidden' name='ra' value=".$ra." />.$nome.
				<p align='center'><input type='hidden' name='nome' value='$nome' />
				<p align='center'><input name='Proximo' type='submit' id='Confirmar' value='Proximo' /></p>
				<br />	

            </form>
			<p align='center'><a href='../'>Sair</a></p>
        </div>
        
        <br />
        
        <div id='rodape'>
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>";			
	echo $meuhtml;
	
	}catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
		}
							
?>		
			
				
		
	

				
				