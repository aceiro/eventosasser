<?php 
	require_once("../../cfg/Session.php");
	$config = require '../../cfg/config.php';
	$session = new Session("EventosAsser2016");
	header("Content-Type: text/html; charset=UTF-8", true);
	include_once('../../utils/common.php');
	
	
	require_once("../professor/BD.php");
	$bd = new BD();
	$bd->checkUsuario($session->get('login'));
	error_reporting(0);
    if(!strcmp($session->get('login'),null)){
       header('Location: ../../');
       die();
    }
?>
        
<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-store" />
	<link rel="shortcut icon" href="../../favicon.ico">
	<title>Asser Eventos</title>
	
	<!-- adicionado o suporte para o jquery e thema redmond -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<!-- outros suporte a css da página -->
	<link rel="stylesheet" href="../../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../../css/estilo.css" type="text/css">

	<!-- outros scripts para o menu-->
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script src="../../scripts/asser-main-menu.js"></script>
	<script src="../../scripts/asser-commum.js"></script>

</head>

<body>
	<div id="corpo">
    	
        <div id="cabecalho">
        </div>
        
        <br />

        <!-- inicio do menu da aplicacao -->
          <div id='cssmenu'>
                <ul>
                   <li class='active'><a href='../../'>Sair</a></li>
                </ul>
            </div>

            <!-- adiciona o suporte ao separador gradiente -->
            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 
        <br />
        
      <div id="texto">
    		<fieldset>	
			<legend>Funções</legend>
			
			<div id="effect" class="ui-corner-all">O que deseja fazer?</div><br />
			<table align="center" style="width:60%">
			<tr><td>Confirmar pagamento Painel | Oral | Banca</td>
			<td><a href="pagto"><img src="../../imagens/play.png" width="35" height="35"/></a></td></tr>
			<tr><td>Confirmar pagamento Ouvintes</td>
			<td><a href="pgtouviente"><img src="../../imagens/play.png" width="35" height="35"/></a></td></tr>
			<tr><td>Cadastrar Palestra</td>
			<td><a href="palestra"><img src="../../imagens/play.png" width="35" height="35"/></a></td></tr>
			<tr><td>Listas de presença</td>
			<td><a href="presenca"><img src="../../imagens/play.png" width="35" height="35"/></a></td></tr>
			<tr><td>Avaliar Resumo</td>
			<td><a href="avaliar"><img src="../../imagens/play.png" width="35" height="35"/></a></td></tr>
			<tr><td>Relatório de alunos participantes da mostra com pagamento efetuado</td>
			<td><a href="pagrecebido"><img src="../../imagens/play.png" width="35" height="35"/></a></td></tr>
			<tr><td>Relatório de alunos ouvintes da mostra com pagamento efetuado</td>
			<td><a href="pagrecouvinte"><img src="../../imagens/play.png" width="35" height="35"/></a></td></tr>
			</table>

        <br />
</div>
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
