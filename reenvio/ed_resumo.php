<?php
	session_start();
?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos - Cadastro realizado com sucesso</title>
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
            keyword: "required"
        },
        
        // Specify the validation error messages
        messages: {
            titulo: "Copie e cole o título aqui.",
            curso: "Escreva o nome do curso aqui.",
			orientador: "Escreva o nome do orietador aqui.",
			autores: "Copie e cole os autores aqui.",
			resumo: "Copie e cole o resumo aqui.",
            keyword: "Copie e cole as palavras-chave aqui."
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
		    <form id="register-form" name="register-form" method="post" action="confirma.php"  novalidate="novalidate">
            	<p align="center">Copie e cole, ou escreva as informações para o envio do resumo nos campos abaixo:</p>
				
			<p align="center"><b>Comentários:</b></p>
			<p align="center"><textArea id="comentarios" name="comentarios" cols="100" rows="7" ><?php echo $_SESSION['comentarios']; ?></textArea></p>
								
			<p align="center"><b>Titulo:</b></p>
		    	<p align="center"><input type="text" id="titulo" name="titulo" size="70" maxlength="65"/></p>
                				
                <p align="center"><b>Curso:</b></p>
                <p align="center"><input type="text" id="curso" name="curso" size="70" maxlength="65" /></p>
                                
			<p align="center"><b>Orientador:</b></p>
			<p align="center"><input type="text" id="orientador" name="orientador" size="70" /></p>
			<p align="center"><input id="email" name="email" type="hidden" value="<?php echo $_SESSION['email'];?>" /></p>
				
			<p align="center"><b>Autor(es):</b></p>
			<p align="center"><font face="Arial, Helvetica, sans-serif" size="-1"> Separe os autores com ;</font></p>
			<p align="center"><font face="Arial, Helvetica, sans-serif" size="-1">Exemplo: Azdrubal Peichoto - azdrubal@hotmail.com; Joseph Martins - joseph@hotmail.com</font></p>
			<p align="center"><input type="text" id="autores" name="autores" size="70" /></p>
                
				<p align="center"><b>Resumo:</b></p>
				<p align="center"><textArea id="resumo" name="resumo" cols="100" rows="7"></textArea></p>
				
				<p align="center"><b>Palavras-chave:</b></p>
				<p align="center"><input type="text" id="keyword" name="keyword" size="70" maxlength="65" /></p>
				
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