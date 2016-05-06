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

</head>
<script> 
$(function() {
    $("#register-form").validate({
        rules: {
            login: "required",
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            login: "Entre com o login",
            password: {
                required: "Por favor, digite sua senha",
                minlength: "Sua senha deve ter mais de 5 caracteres"
            }
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
        
          <div id='cssmenu'>
                <ul>
                   <li><a href='../index.html'>Evento</a></li>      
                   <li><a href='../sumissao.html'>Submissão de Trabalhos</a></li>
                   <li><a href='../palestra'>Palestras</a></li>
                   <li><a href='../programa.html'>Programação</a></li>            
                   <li><a href='../anais'>Edições<br>Anteriores</a></li>          
                   <li><a href='../contato'>Contato</a></li>
                   <li><a href='../creditos.html'>Créditos</a></li>
                </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 
             
        <br />
        
        <div>
    		<form id="register-form" name="register-form" method="post" action="a_login.php"  novalidate="novalidate">			  
				<fieldset>
				  <legend>Login</legend>
				  <div> 
					<label>Tipo de função</label>
					<select id="funcao" name="funcao">
						<option value="secretariado">Secretariado</option>
						<option value="professor">Professor Avaliador</option>
						<option value="administrativo">Administrativo</option>
					</select>
				  </div>
				  
				  <div> 
					<label>Usuário</label><input type="text" id="login" name="login" size="30" maxlength="30" />
				  </div>

				  <div>
					<label>Senha</label><input type="password" id="password" name="password" size="6" maxlength="6" />
				  </div>

				  <div class="button">
					<input name="acessar" type="submit" id="acessar" value="Acessar" />
				  </div>
				</fieldset>        
			</form>
        </div>
        
        <br />
      <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>
