<?php session_start();
    $user = $_SESSION['email'];
    if($user==null){
        header('Location: ../../../index.html');
        die();
    }
?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
	<title>Asser Eventos</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

<script src="../../../scripts/asser-main-menu.js"></script>
<script src="../../../scripts/asser-commum.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  
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

<body>
	<div id="corpo">
    	
		<div id="cabecalho">

        </div>
        
        <br />

          <div id='cssmenu'>
                <ul>
                   <li class='active'><a href='../index.html'>Submissão de Resumos</a></li>
                   <li><a href='../palestra'>Palestras</a></li>
                   <li><a href='../programa.html'>Programação</a></li>            
                   <li><a href='#'>Sobre o evento</a></li>             
                   <li><a href='../'>Administrativo</a></li>
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
    		<form id="register-form" name="register-form" method="post" action="confirma.php"  novalidate="novalidate">	
		<fieldset>
			<legend>Cadastro de palestras</legend>
			<div>
				<label>Palestras cadastradas </label> <a href="listar.php">AQUI</a>
			</div>
               <div>
				<label>Palestrante</label>
				<input type="text" id="palestrante" name="palestrante" size="50" maxlength="100" />
			</div>
			<div>
				<label>Titulo da Palestra</label>
				<input type="text" id="palestra" name="palestra" size="50" maxlength="150" />
			</div>
               <div>
			   <label>Dia da semana</label>
					<select name="dia" id="dia">
					<option value="Segunda-feira">Segunda-feira</option>
					<option value="Terça-feira">Terça-feira</option>
					<option value="Quarta-feira">Quarta-feira</option>
					<option value="Quinta-feira">Quinta-feira</option>
					<option value="Sexta-feira">Sexta-feira</option>
				</select>
			</div>  
			<div>
				<label>Hora de início da palestra</label>
				<input type="text" name="horario" id="horario" size="50">
			</div>  
			<p  align="center"><input name="acessar" type="submit" id="cadastrar" value="Cadastrar" /></p>  </form>
			<p align="center"><a href="../">Sair</a></p>
        </div>
		</fieldset>
		</form>
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
