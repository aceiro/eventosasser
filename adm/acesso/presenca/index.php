<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>
<link REL=StyleSheet HREF="../../../css/estilo.css" TYPE="text/css"></head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
				IX - Semana Conhecimento e VI - Mostra de Iniciação Científica
		</div>
        
        <br />
        
        <div id="mmenu">
		Palestras - Inscrição</div>
        
        <br />
        
        <div id="texto">
    		<form id="cad_usuario" name="usuario" method="post" action="listar.php" >

				<p align="center"><b>Escolha uma palestra para gerar a lista de presença</b></p>
				<?php
				// Estabelecendo a conexão com o banco de dados
					try{
						$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
						$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
						$sql = "SELECT * FROM palestra";
						echo "<p align='center'><select name='palestra' id='palestra'>";
		
						foreach($link->query($sql) as $row){
							$umdia = $row['dia'].' '.$row['horario'].' '.$row['palestrante'].' '.$row['palestra'];
							echo "<option value='$umdia'>$umdia</option>";	
						}
						echo '</select></p>';							
					}catch(PDOException $e){
						echo "ERROR" . $e->getMessage();
					}
				?>
				<p align="center"><input name="Proximo" type="submit" id="Confirmar" value="Proximo" /></p>
				<br />	

            </form>
        </div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
