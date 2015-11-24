<?php session_start();
    $user = $_SESSION['email'];
    if($user==null){
       header('Location: ../../index.html');
       die();
    }
?>
        
<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store" />
    <link rel="shortcut icon" href="../../favicon.ico">
    <title>Asser Eventos</title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link rel="stylesheet" href="../../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../../css/estilo.css" type="text/css">

<script src="../../scripts/asser-main-menu.js"></script>
<script src="../../scripts/asser-commum.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

<body>
	<div id="corpo">
    	
        <div id="cabecalho">
        </div>
        
        <br />

        <!-- inicio do menu da aplicacao -->
          <div id='cssmenu'>
                <ul>
                   <li><a href='#'>Evento</a></li> 
                   <li class='active'><a href='../index.html'>Submissão de Trabalhos</a></li>
                   <li><a href='../palestra'>Palestras</a></li>
                   <li><a href='../programa.html'>Programação</a></li>            
                    
                   <li class='has-sub'> <a href='#'>Edições anteriores</a> 
                        <ul>
                          <li> <a href='../anais/Anais2015_FINAL.pdf' target="_blank"> V Mostra de Iniciação Científica e Workshop (Anais 6/2015)</a> </li>
                        </ul>
                  </li> 

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
			</table>

        <br />
</div>
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
