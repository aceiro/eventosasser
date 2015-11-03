<?php
	session_start();
?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos</title>
<link REL=StyleSheet HREF="../css/estilo.css" TYPE="text/css"></head>

 <!-- Load jQuery and the validate plugin -->
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  
  <!-- jQuery Form Validation code -->
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules 
        rules: {
            titulo: "required",
            curso: "required",
			orientador: "required",
            autores: "required",
		    resumo: "required",
		    keyword: "required",
        },
        
        // Specify the validation error messages titulo curso orientador email autores resumo keyword
        messages: {
            titulo: "Escreva o titulo",
			curso: "Escreva o nome do seu curso",
			orientador: "Escreva o nome do seu orientador",
			autores: "Escreva o nome do autor",
			resumo: "Copie e cole seu resumo",
            keyword: "Copie e cole as palavras-chave"
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
			IX - Semana Conhecimento e VI - Mostra de Iniciação Científica
		</div>
        
        <br />
        
        <div id="mmenu">
		<a>Dados Pessoais</a> | Dados Resumo | <a>Resumo Enviado</a> </div>
        
        <br />
        
        <div id="texto">
		    <form id="register-form" name="register-form" method="post" action="confirmaResumo.php"  novalidate="novalidate">
				<p align="center">Copie e cole, ou escreva as informações para o envio do resumo nos campos abaixo:</p>
								
				<p align="center"><b>Titulo:</b></p>
				<p align="center"><input type="text" id="titulo" name="titulo" size="70" maxlength="250"  /></p>
                				
				<p align="center"><b>Curso:</b></p>
				<p align="center"><input type="text" id="curso" name="curso" size="70" maxlength="65" /></p>
                                
				<p align="center"><b>Orientador:</b></p>
				<p align="center"><input type="text" id="orientador" name="orientador" size="70" maxlength="150" /></p>
				<p align="center"><input type="hidden" name="email" id="email" value="<?php echo $email;?>" /></p>
				
			  	<p align="center"><font face="Arial, Helvetica, sans-serif" size="-1">Você pode adicionar até 4 autores</font></p>
				<p align="center"><b>Autor (1):</b></p>				
				<p align="center"><input type="text" id="autor1" name="autor1" size="40" maxlength="255" value="<?php echo $_SESSION['nome']; ?>" /> - <input type="text" id="email1" name="email1" size="40" maxlength="255" value="<?php echo $_SESSION['email']; ?>" /></p>
				<p align="center"><b>Autor (2):</b></p>	
				<p align="center"><input type="text" id="autor2" name="autor2" size="40" maxlength="255" /> - <input type="text" id="email2" name="email2" size="40" maxlength="255" /></p>
				<p align="center"><b>Autor (3):</b></p>	
				<p align="center"><input type="text" id="autor3" name="autor3" size="40" maxlength="255" /> - <input type="text" id="email3" name="email3" size="40" maxlength="255" /></p>
				<p align="center"><b>Autor (4):</b></p>	
				<p align="center"><input type="text" id="autor4" name="autor4" size="40" maxlength="255" /> - <input type="text" id="email4" name="email4" size="40" maxlength="255" /></p>
                
				<p align="center"><b>Resumo:</b></p>
				<p align="center"><textArea id="resumo" name="resumo" cols="100" rows="7"></textArea></p>
				
				<p align="center"><b>Palavras-chave:</b></p>
				<p align="center"><input type="text" id="keyword" name="keyword" size="100" maxlength="95" /></p>
				
                <p align="center">
              <input name="cadastrar" type="submit" id="cadastrar" value="Confirmar cadastro" />
              <input name="limpar" type="reset" id="limpar" value="Limpar Campos!" /><br /> </p>
            </form>
		</div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>