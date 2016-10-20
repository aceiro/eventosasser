<?php
    require_once("../constants/asser_eventos_constants.php");
	require_once("../cfg/Session.php");
    header("Content-Type: text/html; charset=UTF-8", true);
    $session = new Session("EventosAsser2016");

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
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
					nome: "required",
                    curso: "required",
					tipo: "required",
					email: {
						required: true,
						email: true
					},
					password: {
						required: true,
						minlength: 5
					}
				},
				messages: {
					nome: "Escreva o seu nome completo",
					email: "Escreva seu endereço de email corretamente",
					  tipo: "Escolha um tipo de participação",
                    password: {
                        required: "Por favor, digite uma senha",
                        minlength: "Sua senha deve ter mais de 5 caracteres"
                    },
                    password1: {
                        required: "Por favor, digite uma senha",
                        minlength: "Sua senha deve ter mais de 5 caracteres"
                    }
				},
				
				submitHandler: function(form) {
                    senha = document.getElementById('password');
                    senhaRepetida = document.getElementById('password1');
                    if (senha != senhaRepetida){
                        alert("Repita a senha corretamente");
                        document.getElementById('password1').focus();
                        return false;
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
                   <li class='active'><a href='../index.html'>Inscrição no evento</a></li>
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

        <br />
        
        <div id="texto">
    		<form id="register-form" 
                  name="register-form" method="post" 
                  action="confirma_login_controller.php"  novalidate="novalidate">

                <fieldset>
                        <legend>Acesso ao sistema de Eventos</legend>

                        <div>
                            <label>E-mail:</label>
                            <input type="text" id="email" name="email" size="50" maxlength="65"/>
                        </div>

                        <div>
                            <label>Senha:</label>
                            <input type="password" id="senha" name="senha" size="50" maxlength="8" />
                        </div>
                        
                </fieldset>
                <div class="text-align-center">
                           <input class="button button-center" name="cadastrar" type="submit" id="cadastrar" value="Enviar" />
                           <input class="button button-center" name="limpar" type="reset" id="limpar" value="Limpar" />
                </div>
            </form>
        </div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>
