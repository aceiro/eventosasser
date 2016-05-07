<?php 
	require_once("../cfg/Session.php");
	require_once("BD.php");
	error_reporting(0);
	$bd = new BD();
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../utils/common.php');
	$bd->gravaResumo();
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

	<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">

	<script src="../scripts/asser-main-menu.js"></script>
	<script src="../scripts/asser-commum.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
</head>
<body>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />
        
          <div id='cssmenu'>
                <ul>
                   <li><a href='../index.html'>Evento</a></li>       
                   <li class='active'><a href='../index.html'>Submissão de Trabalhos</a></li>
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
            	<fieldset>
				<legend>Cadastro realizado com sucesso!</legend>
				<br />
				
				<p id="effect" class="ui-corner-all">O que fazer agora?</p>
				<p id="effect" class="ui-corner-all">Agora você pode verificar o andamento da avaliação do seu resumo. Basta clicar em Verificar resumo.</p>
				<p id="effect" class="ui-corner-all">Caso seu resumo estiver com <strong>Status</strong> de <strong>aprovado</strong>, recolher taxa de R$ 20,00 na secretaria da faculdade.</p>
				
				<br />
				<p align="center"><a href="../">Voltar</a> | <a href="../listar">Verificar resumo</a></p>
			</fieldset>
		</div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>