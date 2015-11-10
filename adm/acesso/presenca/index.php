<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

<script src="../../../scripts/asser-main-menu.js"></script>
<script src="../../../scripts/asser-commum.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
</head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />

          <div id='cssmenu'>
                <ul>
                   <li class='active'><a href='../index.html'>Submissão de Resumos</a></li>
                   <li><a href='../palestra'>Palestras</a></li>
                   <li><a href='../programa.html'>Programação</a></li>            
                   <li><a href='#'>Sobre o evento</a></li>             
                   <li><a href='../'>Administrativo</a></li>
                   <li><a href='../contato'>Contato</a></li>
                   <li><a href='../creditos.html'>Créditos</a></li>
                </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 
        
        <div id="texto">
    		<form id="cad_usuario" name="usuario" method="post" action="listar.php" >
		<fieldset>
			<legend>Listagem das palestras</legend>
				<div id="effect" class="ui-corner-all">Escolha uma palestra para gerar a lista de presença</div>
				<?php
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
		</fieldset>
           </form>
        </div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
