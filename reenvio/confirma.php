<?php
	$config = require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	
	$session->set('titulo',$_POST['titulo']);
	$session->set('nome',$_POST['nome']);
	$session->set('autores',$_POST['autor1']);
	$session->set('curso',$_POST['curso']);
	$session->set('orientador',$_POST['orientador']);
	$session->set('resumo',$_POST['resumo']);
	$session->set('keyword',$_POST['keyword']);
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
	<div id="corpo">
	
		<div id="cabecalho">
        </div>
        
        <br />
        
		<div id='cssmenu'>
            <ul>
				<li><a href='../index.html'>Evento</a></li>
				<li class='active'><a href='../index.html'>Submissão de Resumos</a></li>
				<li><a href='../palestra'>Palestras</a></li>
				<li><a href='../programa.html'>Programação</a></li>
				<li> <a href='../anais'>Edições<br>Anteriores</a></li>  
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
		    <form id="register-form" name="register-form" method="post" action="final.php"  novalidate="novalidate">
			<fieldset>
			<legend> Confirma Enviar? </legend>
				<div class="titulo"><center><strong><?php echo strtoupper($session->get('titulo')); ?></strong></center></div>
                <div class="curso">Curso: <?php echo $session->get('curso'); ?></div>
				<div class="curso">Orientador: <?php echo $session->get('orientador'); ?></div>
				<div class="curso">Autores: <?php echo $session->get('autores'); ?></div>		
				<div class="resumo"><?php echo $session->get('resumo'); ?></div>
				<div class="resumo">Palavras-chave: <?php echo $session->get('keyword'); ?></div>
				<div class="button">
              		<input name="cadastrar" type="submit" id="cadastrar" value="Confirmar Envio?" />
              	</div>
			</fieldset>
            </form>
		</div>
        
        <br />
    </div>

    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>