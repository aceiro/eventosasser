<?php 
	require_once("../cfg/BD.php");
	require_once("../cfg/Session.php");
	error_reporting(0);
	$session = new Session("EventosAsser2016");
	$bd = new BD();
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../utils/common.php');
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
	<!-- adicionado o suporte para o jquery e thema redmond -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- outros suporte a css da página -->
	<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">
	<!-- outros scripts para o menu-->
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script src="../scripts/asser-main-menu.js"></script>
	<script src="../scripts/asser-commum.js"></script>
</head>
 
<body>
	<div id='corpo'>
    	
		<div id='cabecalho'>
        </div>        
        <br />
        
        <!-- menu da aplicacao -->
          <div id='cssmenu'>
                <ul>
                   <li><a href='../'>Sair</a></li> 
                </ul>
            </div>

            <!-- adiciona o suporte ao separador gradiente -->
            <div id='mmenu'> &nbsp;</div>
            <div id='mmenubar'> &nbsp;</div>
            <div id='mmenusubbar'> &nbsp;</div>
            <div id='mmenusubsubbar'> &nbsp;</div>
            <br />        
        <br />        
        <br />
        
        <div>
		<form id='cad_usuario' name='usuario' method='post' action='confirma.php' >
				<p align='center'><b>Escolha uma palestra</b></p>
				<div align='center'><select name='palestra' id='palestra' style='width:700px;'>
				<?php
					foreach($bd->listarPalestras() as $row){
						$palestras = $row['dia'] . ' '. $row['horario'] . ' ' . $row['palestrante'] . ' ' . $row['palestra'];
						$meuhtml = $meuhtml . "<option value='{$palestras}'>{$palestras}</option>";
					}
					echo $meuhtml;
				?>
				</select></div>
				<div class='button'>	
					<input name='proximo' style='width:30%;' type='submit' id='proximo' value='Proximo' />
				</div>
				<br />	
            </form>
        </div>        
        <br />
    
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>