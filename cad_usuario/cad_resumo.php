<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-store" />
	<link rel="shortcut icon" href="../favicon.ico">
	<title>Asser Eventos</title>
	

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script src="../scripts/asser-main-menu.js"></script>
	<script src="../scripts/asser-commum.js"></script>
	<script src="../scripts/asser-submission.paper-1.0.0.js"></script>

	<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">

	<script type="text/javascript">
		var evs = ASSER.submission;

	  	$(function() {
		    evs.init();		   
		});

		$(document).ready(function(){
			var TimeoutFadeIn = {
				FAST		: 1500,
				SLOW		: 3000,
				VERY_SLOW	: 6000
			};

			$("#effect").fadeIn(TimeoutFadeIn.FAST);
			$("#info-title-bubble").fadeIn(TimeoutFadeIn.SLOW);
			$("#info-course-bubble").fadeIn(TimeoutFadeIn.SLOW);	
			$("#info-adviser-bubble").fadeIn(TimeoutFadeIn.VERY_SLOW);
			$("#info-authors-bubble").fadeIn(TimeoutFadeIn.VERY_SLOW);
			$("#info-abstract-bubble").fadeIn(TimeoutFadeIn.VERY_SLOW);
			$("#info-keywords-bubble").fadeIn(TimeoutFadeIn.VERY_SLOW);
			
			
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
        
        <fieldset>
			<legend> Cadastro de Resumo </legend>
	        <div>
			    <form id="register-form" name="register-form" method="post" action="confirmaResumo.php"  novalidate="novalidate">
					<div>
						<p id="effect" class="ui-corner-all display-none">

							Copie e cole, ou escreva as informações para o envio do resumo nos campos abaixo.
							Ao lado de cada item, você vai encontrar balões como este 
							explicando o que deve ser colocado em cada campo. 
							</p>
					</div>			

					<div id="info-title-bubble" class="info-resumo display-none">Lembre-se o título descreve sinteticamente o seu trabalho</div>
					<div class="rotulo-resumo">Titulo</div>
					<div class="input-resumo"><input type="text" id="titulo" name="titulo" size="100" maxlength="250"  /></div>
	                
	                <div id="info-course-bubble" class="info-resumo display-none">Escolha o curso</div>
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
						<option value="Bacharelado em Farmácia">Bacharelado em Farmácia</option>
						<option value="Tecnólogo em Design de Interiores">Tecnólogo em Design de Interiores</option>
						<option value="Tecnólogo em Gestão Financeira">Tecnólogo em Gestão Financeira</option>
						<option value="Tecnólogo em Gestão da Produção Industrial">Tecnólogo em Gestão da Produção Industrial</option>
					</select></center></br>
					                                
					<div id="info-adviser-bubble" class="info-resumo display-none">Preencha com o nome do seu orientador. Não esqueça da titulação Esp./Ms./Dr.</div>                                 
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
									
				  	<div id="info-authors-bubble" class="info-resumo display-none">Informe nome completo e e-mail dos autores</div>	
					<br/>
				  	<table id="table-authors-wrapper">
				    <thead>
				        <tr>
				           		<th id="table-author-col">Autor</th>
								<th id="table-author-name">Nome Completo</th>
								<th id="table-author-email">E-mail</th>
				        </tr>
				    </thead>
				  	
				    <tbody>
				        <tr>
				            <td colspan="3">
							        <div id="table-authors-container" class="scrollit">
							            <table id="table-authors">
							                <tr>
												<td> Autor (1) </td>
												<td> <input type="text" id="autor1" name="autor1" size="40" maxlength="255" /> </td>
												<td> <input type="text" id="email1" name="email1" size="40" maxlength="255" /> </td>
											</tr>

							                <tr>
												<td> Autor (2) </td>
												<td> <input type="text" id="autor2" name="autor2" size="40" maxlength="255" /> </td>
												<td> <input type="text" id="email2" name="email2" size="40" maxlength="255" /> </td>
											</tr>

											<tr>
												<td> Autor (3) </td>
												<td> <input type="text" id="autor3" name="autor3" size="40" maxlength="255" /> </td>
												<td> <input type="text" id="email3" name="email3" size="40" maxlength="255" /> </td>
											</tr>

											<tr>
												<td> Autor (4) </td>
												<td> <input type="text" id="autor4" name="autor4" size="40" maxlength="255" /> </td>
												<td> <input type="text" id="email4" name="email4" size="40" maxlength="255" /> </td>
											</tr>

											<tr>
												<td> Autor (5) </td>
												<td> <input type="text" id="autor5" name="autor5" size="40" maxlength="255" /> </td>
												<td> <input type="text" id="email5" name="email5" size="40" maxlength="255" /> </td>
											</tr>
							            </table>
							        </div>
				                </td>
				        </tr>
				    </tbody>
				</table>
								             
				<button  class="button button-right" type="button" onclick="evs.addNewAuthorRowToTable();">Novo autor</button>
				<br/> <br/> <br/>
					
			                
	                <div id="info-abstract-bubble" class="info-resumo display-none"> &nbsp; Informe seu resumo aqui, com Contexto, Lacuna de pesquisa, Objetivo, Metodologia, Resultado e Conclusão.
	                </div>
					<div class="rotulo-resumo">Resumo</div>
					<div class="input-resumo"><textArea id="resumo" name="resumo" cols="100" rows="7"></textArea></div>
					
					<div id="info-keywords-bubble" class="info-resumo display-none">Adicone pelo menos três palavras-chave que caracterizem o seu trabalho. 
					Coloque as palavras-chave separadas por ponto-e-virgula. Por exemplo, <strong>Sistema Toyota; Administração de Empresas; Gestão</strong></div>
					<div class="rotulo-resumo">Palavras-chave</div>
					<div class="input-resumo"><input type="text" id="keyword" name="keyword" size="100" maxlength="95" /></div>
					
	                 <div class="text-align-center">
	              		<input class="button button-center" name="cadastrar" type="submit" id="cadastrar" value="Confirmar" /> 
	              		<input class="button button-center" name="limpar" type="reset" id="limpar" value="Limpar" />
	              	</div>
					
	              
	            </form>
			</div>
		</fieldset>

        <br />      
    <div id="rodape">
            <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
        </div>
    </div>
</body>
</html>