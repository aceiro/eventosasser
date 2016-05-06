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
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


	<script src="../scripts/asser-main-menu.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script src="../scripts/asser-commum.js"></script>

	<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">

	<script>
  
  $(function() {
  
    $("#register-form").validate({
        rules: {
            titulo: "required",
            curso: "required",
			orientador: "required",
            autores: "required",
		    resumo: "required",
		    keyword: "required",
        },
        
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
</head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />
        
          <div id='cssmenu'>
                <ul>
                   <li><a href='../index.html'>Evento</a></li>             
                   <li class='active'><a href='../index.html'>Submissão de Trabalhos</a></li>
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
        
        <br />
        

        <div>
		    <form id="register-form" name="register-form" method="post" action="confirmaResumo.php"  novalidate="novalidate">
				<fieldset>
					<legend> Cadastro de Resumo </legend>
				<div>
					<p id="effect" class="ui-corner-all">

						Copie e cole, ou escreva as informações para o envio do resumo nos campos abaixo.
						Ao lado de cada item, você vai encontrar balões como este 
						explicando o que deve ser colocado em cada campo. 
						</p>
				</div>			

				<div class="info-resumo">Lembre-se o título descreve sinteticamente o seu trabalho</div>
				<div class="rotulo-resumo">Titulo</div>
				<div class="input-resumo"><input type="text" id="titulo" name="titulo" size="100" maxlength="250"  /></div>
                
                <div class="info-resumo">Escolha o curso</div>
				<div class="rotulo-resumo">Curso</div>
				<center><select id="curso" name="curso">
					<option value="Bacharelado em Administração">Bacharelado em Administração</option>
					<option value="Bacharelado em Arquitetura e Urbanismo">Bacharelado em Arquitetura e Urbanismo</option>
					<option value="Licenciatura em Pedagogia">Licenciatura em Pedagogia</option>
					<option value="Bacharelado em Comunicação Social Publicidade e Propaganda">Bacharelado em Comunicação Social Publicidade e Propaganda</option>
					<option value="Bacharelado em Engenharia Civil">Bacharelado em Engenharia Civil</option>
					<option value="Bacharelado em Engenharia de Produção">Bacharelado em Engenharia de Produção</option>
					<option value="Bacharelado em Sistemas de Informação">Bacharelado em Sistemas de Informação</option>
					<option value="Bacharelado em Educação Física">Bacharelado em Educação Física</option>
					<option value="Licenciatura em Educação Física">Licenciatura em Educação Física</option>
					<option value="Bacharelado em Fisioterapia">Bacharelado em Fisioterapia</option>
					<option value="Bacharelado em Nutrição">Bacharelado em Nutrição</option>
					<option value="Tecnólogo em Farmácia">Tecnólogo em Farmácia</option>
					<option value="Tecnólogo em Design de Interiores">Tecnólogo em Design de Interiores</option>
					<option value="Tecnólogo em Gestão Financeira">Tecnólogo em Gestão Financeira</option>
					<option value="Tecnólogo em Gestão da Produção Industrial">Tecnólogo em Gestão da Produção Industrial</option>
				</select></center></br>
				                                
				<div class="info-resumo">Preencha com o nome do seu orientador. Não esqueça da titulação Esp./Ms./Dr.</div>                                 
				<div class="rotulo-resumo">Orientador</div>
				<div class="input-resumo">
				<select id="esp" name="esp">
					<option value="Prof. Esp.">Prof. Esp.</option>
					<option value="Prof. Esp.(a)">Prof.(a) Esp.</option>
					<option value="Prof. Ms.">Prof. Ms.</option>
					<option value="Prof. Ms.(a)">Prof.(a) Ms.</option>
					<option value="Prof. Dr.">Prof. Dr.</option>
					<option value="Prof. Dr.(a)">Prof.(a) Dr.</option>
				</select>
				<input type="text" id="orientador" name="orientador" size="75" maxlength="255" /></div>
								
			  	<div class="info-resumo">Informe nome completo e e-mail dos autores</div>
				<div class="rotulo-resumo">Autor (1)</div>			
				<div class="input-resumo"><input type="text" id="autor1" name="autor1" size="40" maxlength="255" /> - <input type="text" id="email1" name="email1" size="40" maxlength="255" /></div>

				<div class="rotulo-resumo">Autor (2)</div>
				<div class="input-resumo"><input type="text" id="autor2" name="autor2" size="40" maxlength="255" /> - <input type="text" id="email2" name="email2" size="40" maxlength="255" /></div>

				<div class="rotulo-resumo">Autor (3)</div>	
				<div class="input-resumo"><input type="text" id="autor3" name="autor3" size="40" maxlength="255" /> - <input type="text" id="email3" name="email3" size="40" maxlength="255" /></div>

				<div class="rotulo-resumo">Autor (4)</div>
				<div class="input-resumo"><input type="text" id="autor4" name="autor4" size="40" maxlength="255" /> - <input type="text" id="email4" name="email4" size="40" maxlength="255" /></div>
				
				<div class="rotulo-resumo">Autor (5)</div>
				<div class="input-resumo"><input type="text" id="autor5" name="autor5" size="40" maxlength="255" /> - <input type="text" id="email5" name="email5" size="40" maxlength="255" /></div>
				<!-- Aqui precisa de um botão, ou link para abrir esta opção e inserir mais autores!! -->
				<div class="info-resumo">Para cadastrar mais autores, clique no link mais autores</div>
				<div class="rotulo-resumo"><a href="">Mais autores?</a>
				<input type="text" id="autorplus[]" name="autorplus[]" size="40" maxlength="255" /> - <input type="text" id="emailplus[]" name="emailplus[]" size="40" maxlength="255" /></div><!-- Aqui deve se declarar um variável do tipo vetor-->
		                
                <div class="info-resumo">Aqui você deve inserir o seu resumo. Não esqueça que um resumo deve contér:
                <strong>Contexto, Lacuna de pesquisa, Objetivo, Metodologia, Resultado e Conclusão</strong></div>
				<div class="rotulo-resumo">Resumo</div>
				<div class="input-resumo"><textArea id="resumo" name="resumo" cols="100" rows="7"></textArea></div>
				
				<div class="info-resumo">Adicone pelo menos três palavras-chave que caracterizem o seu trabalho. 
				Coloque as palavras-chave separadas por ponto-e-virgula. Por exemplo, <strong>Sistema Toyota; Administração de Empresas; Gestão</strong></div>
				<div class="rotulo-resumo">Palavras-chave</div>
				<div class="input-resumo"><input type="text" id="keyword" name="keyword" size="100" maxlength="95" /></div>
				
                <div class="button">
              		<input name="cadastrar" type="submit" id="cadastrar" value="Confirmar cadastro" />
              		<input name="limpar" type="reset" id="limpar" value="Limpar Campos!" />
              	</div>
				
              </fieldset>
            </form>
		</div>
        <br />
				<div class="rotulo-resumo"><hr></div>
				<div class="info-resumo">Acompanhe o status do trabalho, caso precise reenviar, as informações abaixo serão necessárias:</div>
				<div class="rotulo-resumo"><strong>Guarde os cadastrados no acesso</strong></div>
				<div class="input-resumo">
					LOGIN: <strong><?php echo $session->get('login'); ?></strong> <br />
					Senha: <strong><?php echo $session->get('password'); ?></strong>
				</div>
      
    <div id="rodape">
            <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
        </div>
    </div>
</body>
</html>