<?php 
	require_once("../cfg/Session.php");
	error_reporting(0);
	$session = new Session("EventosAsser2016");
	require_once("../cfg/BD.php");
	$bd = new BD();
	$bd->selecionaUmResumo();
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
				titulo: "required",
				curso: "required",
				orientador: "required",
				autores: "required",
				resumo: "required",
				keyword: "required"
			},        
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
</head>
<body>
	<div id="corpo">
	
		<div id="cabecalho">
        </div>
        
        <br />
        
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

        <div id="mmenu"> &nbsp;</div>
        <div id="mmenubar"> &nbsp;</div>
        <div id="mmenusubbar"> &nbsp;</div>
        <div id="mmenusubsubbar"> &nbsp;</div>
        <br />
        
        <div id="texto">
		    <form id="register-form" name="register-form" method="post" action="confirma.php"  novalidate="novalidate">
			<fieldset>
			<legend> Reenvio do Resumo </legend>
				<div>
					<p id="effect" class="ui-corner-all">
						Copie e cole, ou escreva as informações para o reenvio do resumo nos campos abaixo.
						Ao lado de cada item, você vai encontrar balões como este 
						explicando o que deve ser colocado em cada campo. 
						</p>
				</div>		
			<div class="info-resumo">Os comentários propostos pelo avaliador, conduz o autor às alterações que devem ser realizadas no resumo.</div>	
			<div class="rotulo-resumo">Comentários</div>
			<div class="input-resumo"><textArea id="comentarios" name="comentarios" cols="100" rows="7" ><?php echo $session->get('comentarios'); ?></textArea></div>
								
			<div class="rotulo-resumo">Titulo</div>
				<div class="input-resumo"><input type="text" id="titulo" name="titulo" size="70" maxlength="250" value="<?php echo $session->get('titulo'); ?>" /></div>
                
                <div class="info-resumo">Preencha com o curso, por exemplo, <strong>Bacharelado em Pedagogia</strong></div>
				<div class="rotulo-resumo">Curso</div>
				<div class="input-resumo"><input type="text" id="curso" name="curso" size="70" maxlength="65" value="<?php echo $session->get('curso'); ?>" /></div>
                                
				<div class="info-resumo">Preencha com o nome do seu orientador. Não esqueça da titulação Esp./Ms./Dr.</div>                                 
				<div class="rotulo-resumo">Orientador</div>
				<div class="input-resumo"><input type="text" id="orientador" name="orientador" size="70" maxlength="150" value="<?php echo $session->get('orientador'); ?>" /></div>
				<input type="hidden" name="email" id="email" value="<?php echo $email;?>" />
				
			  	<div class="info-resumo">Edição dos Autores</div>
				<div class="rotulo-resumo">Autor principal</div>				
				<div class="input-resumo"><input type="text" id="nome" name="nome" size="40" maxlength="255" value="<?php echo $session->get('nome'); ?>" /> </div>
                <div class="rotulo-resumo">Autores</div>				
				<div class="input-resumo"><input type="text" id="autor1" name="autor1" size="40" maxlength="1500" value="<?php echo $session->get('autores'); ?>" /> </div>
                
                <div class="info-resumo">Aqui você deve inserir o seu resumo. Não esqueça que um resumo deve contér:
                <strong>Contexto, Lacuna de pesquisa, Objetivo, Metodologia, Resultado e Conclusão</strong></div>
				<div class="rotulo-resumo">Resumo</div>
				<div class="input-resumo"><textArea id="resumo" name="resumo" cols="100" rows="7"><?php echo $session->get('resumo'); ?></textArea></div>
				
				<div class="info-resumo">Adicone pelo menos três palavras-chave que caracterizem o seu trabalho. 
				Coloque as palavras-chave separadas por ponto-e-virgula. Por exemplo, <strong>Sistema Toyota; Administração de Empresas; Gestão</strong></div>
				<div class="rotulo-resumo">Palavras-chave</div>
				<div class="input-resumo"><input type="text" id="keyword" name="keyword" size="100" maxlength="95" value="<?php echo $session->get('keyword'); ?>" /></div>
				
                <div class="button">
              		<input name="cadastrar" type="submit" id="cadastrar" value="Confirmar cadastro" />
              		<input name="limpar" type="reset" id="limpar" value="Limpar Campos!" />
              	</div>
			</fieldset>
            </form>
		</div>
        
        <br />
    </div>

    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>