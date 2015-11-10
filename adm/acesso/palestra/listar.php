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
			   <li><a href='../adm'>Administrativo</a></li>
			   <li><a href='../contato'>Contato</a></li>
			   <li><a href='#'>Créditos</a></li>
			</ul>
	 	</div>

		<div id="mmenu"> &nbsp;</div>
		<div id="mmenubar"> &nbsp;</div>
		<div id="mmenusubbar"> &nbsp;</div>
		<div id="mmenusubsubbar"> &nbsp;</div>
        <div>
		<p align="center"><a href="./">Cadastrar Nova</a> | <a href="../">Voltar</a></p>
    		<form id="cad_usuario" name="usuario" method="post" action="av_resumo.php"  onSubmit="return validaCampo(); return false;">
             
<?php
	try{
		$link = new PDO("mysql:host=localhost;dbname=eventsis", "root", "");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * FROM palestra ORDER BY dia";
		
		echo '<p align="center" size="10"><b>';
		echo '<table style="width:100%">';
		echo '<tr><td>DIA</td><td>HORÁRIO</td><td>TITULO</td><td>PALESTRANTE</td></tr>';
				
		foreach($link->query($sql) as $row){
			echo '<tr><td>'.$row['dia'].'</td><td>'.$row['horario'].'</td><td>'.$row['palestra'].'</td><td>'.$row['palestrante'].'</td></tr>';	
		}
		echo '</table>';

	}catch(PDOException $e){
		echo "ERROR" . $e->getMessage();
	}
?>
<p align="center"><a href="./">Cadastrar Nova</a> | <a href="../">Voltar</a></p>
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