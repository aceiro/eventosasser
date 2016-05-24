<?php 
	include_once('../utils/common.php');
	require_once("../cfg/BD.php");
	$bd = new BD();
	header("Content-Type: text/html; charset=UTF-8", true);	
?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-store" />
	<link rel="shortcut icon" href="../favicon.ico">
	<title>Asser Eventos</title>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	 


	<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">
	<link rel="stylesheet" href="../css/list-student-style.css" type="text/css">


	<script src="../scripts/asser-main-menu.js"></script>
	<script src="../scripts/asser-list-student.paper-1.0.0.js"></script>
	<script type="application/javascript">
		$(document).ready(function() {
			var alp = ASSER.liststudentpaper;
				alp.init();
        	}
		);
	</script>
</head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
    	</div>
        
        <br />
        
       <!-- menu da aplicacao -->
      <div id='cssmenu'>
			<ul>
			   <li><a href='../index.html'>Evento</a></li>	
			   <li class='active'><a href='../submissao3.html'>Submissão de Trabalhos</a></li>
			   <li><a href='../palestra'>Palestras</a></li>
			   <li><a href='../programa.html'>Programação</a></li>			   
			   <li> <a href='../anais'>Edições<br>Anteriores</a></li>  
			   <li><a href='../contato'>Contato</a></li>
			   <li><a href='../creditos.html'>Créditos</a></li>
			</ul>
	 	</div>

		<!-- adiciona o suporte ao separador gradiente -->
		<div id="mmenu"> &nbsp;</div>
		<div id="mmenubar"> &nbsp;</div>
		<div id="mmenusubbar"> &nbsp;</div>
		<div id="mmenusubsubbar"> &nbsp;</div>
		<br />   
        
        <div id="listar-coteudo">
		<p align="center"><a href="../">Voltar</a></p>
                <table id="table-hover">
					<caption><strong>Lista de Resumos submetidos </strong><br>
					</caption>
					<th>ID</th><th>TÍTULO</th><th>ALUNO</th><th>CURSO</th><th>STATUS</th>
					<?php

						define('ROW_TEMPLATE','<tr></tr><td>{ID}</td><td>{TITULO}</td><td>{ALUNO}</td><td>{CURSO}</td><td>{STATUS}</td></tr>');

						foreach ($bd->listar() as $row) {
							$status = $row['status'];
							switch($status){
								case 0:{
									$result="<span class=\"glyphicon glyphicon-list-alt\"></span><br/> Enviado";
									break;
								}
								case 1:{
									$result="<span class=\" glyphicon glyphicon-ok-circle\"></span><br/>Aprovado";
									break;
								}
								case 2:{
									$result="<span class=\" glyphicon glyphicon-ban-circle\"></span><br/>Re-enviar";
									break;
								}
								case 3:{
									$result="<span class=\" glyphicon glyphicon-remove-circle\"></span><br/>Reprovado";
									break;
								}
								case 4:{
									$result="<span class=\" glyphicon glyphicon glyphicon-pencil\"></span><br/>Corrigido";
									break;
								}
								default:{
									$result="-";
								}
							}


							$rowBuildId 	  = str_replace("{ID}", $row['id'], ROW_TEMPLATE);
							$rowBuildTitle    = str_replace("{TITULO}", $row['titulo'], $rowBuildId);
							$rowBuildName     = str_replace("{ALUNO}", $row['nome'], $rowBuildTitle);
							$rowBuildCourse   = str_replace("{CURSO}", $row['curso'], $rowBuildName);
							$rowBuildStatus   = str_replace("{STATUS}", $result, $rowBuildCourse);
							echo $rowBuildStatus;
						}
					?>
				</table>
				<br />			
                <p align="center"><a href="../">Voltar</a></p>
				<br />	
        </div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>