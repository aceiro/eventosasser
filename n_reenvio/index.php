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
					r_email: "required",
					r_password: "required"
				},
				messages: {
					r_email: "Obrigatório",
					r_password: "Obrigatório"
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
                   <li class='active'><a>Reenvio de Trabalhos</a></li>
                   <li><a href='../index.html'>Sair</a></li>
                </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 

        <br />

        <div>
    		<form id="register-form" 
                  name="register-form" method="post" 
                  action="confirmaUsuario.php?id=<?php echo $_GET['id'] ?>"  novalidate="novalidate">

                <fieldset>
                        <legend>Login de Acesso do Autor Principal </legend>
                        
                        <div>
                            <label>E-mail:</label>
                            <input type="text" id="r_email" name="r_email" size="50" maxlength="65" value=""autocomplete='off'/>
                        </div>

                        <div>
                            <label>Senha:</label>
                            <input type="password" id="r_password" name="r_password" size="50" maxlength="65" value="" autocomplete='off'/>
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
    <script type="text/javascript">
    	$(document).ready(function() {
			$("#r_email").val("");
			$("#r_password").val("");
		});
    </script>
</body>
</html>
