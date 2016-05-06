<?php 
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");
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
	<script>  
		$(function() {
			$("#register-form").validate({
				rules: {
					email: "required",
					password: "required",
				},        
				messages: {
					email: "Digite um email válido aqui.",
					password: "Digite sua senha aqui."
				},        
				submitHandler: function(form) {
					form.submit();
				}
			});
		});  
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
				<li class='active'><a href='../index.html'>Submissão de Resumos</a></li>
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
        
        <div>
    		<form id="register-form" name="register-form" method="post" action="a_login.php"  novalidate="novalidate">
            <fieldset>
                <legend>Re-envio de Resumo</legend>
                <div>
                    <label>E-mail:</label>
                    <input type="text" id="email" name="email" size="50" maxlength="65" />
                </div>
                <div>
                    <label>Senha:</label>
                    <input type="password" id="password" name="password" size="50" />
                </div>
                <div class="button">
                    <input type="submit" value="Acessar" />
                </div>
            </fieldset>
            </form>
        </div>
        
        <br />
    
     <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>