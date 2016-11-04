<?php
    require_once ('../cfg/Session.php');
    require_once ('../repositorio/models/TipoAtividade.php');
    require_once ('../repositorio/TipoAtividadeRepository.php');
    require_once ('../repositorio/facade/EventosAsserFacade.php');

    $session = new Session("EventosAsser2016");

    $tipoAtividadeRepository = EventosAsserFacade::createTipoAtividadeRepository();
	$orientadorRepository    = EventosAsserFacade::createorientadorRepository();


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
	

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="../html/scripts/notify.min.js"></script>

	<script src="../html/scripts/asser-main-menu.js"></script>
	<script src="../html/scripts/asser-commum.js"></script>
	<script src="../html/scripts/asser-submission.paper-1.0.0.js"></script>

	<link rel="stylesheet" href="../html/css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../html/css/estilo.css" type="text/css">

	<script type="text/javascript">
		var evs = ASSER.submission;

	  	$(function() {
		    evs.init();
			$("#orientador").prop("selectedIndex", -1);
			$("#tipo").prop("selectedIndex", -1);
		});

		// callback (usado para chamar via POST o listar participante com todos autores)
		// 1. retorna uma lista de autores
		$(function() {
			$( "#dados" ).load( "lista_participante_service.php", { }, function() {
				console.log('Lista de participantes carregada com sucesso!');
			});
		});


		function searchOnJsonList(id) {
				// 2. evento para o botao de busca da tabela
				// quando clicado, faz a busca no array via JS e atualiza os
				// campos de input-text, caso contrário, exibe mensagem que o
				// autor não está cadastrado


				if( $("#dados").length!=1 ) {
					console.log('A lista de autores está vazia!');
					throw 'ListaAutoresVaziaException';
					return;
				}

				var emailField = document.getElementById(buildEmailFieldById(id));

				var $dados    = $("#dados")[0].innerHTML;
				var json      = jQuery.parseJSON($dados);
				var foundId   = false;

				$.each(json, function(i, item) {
					if(emailField.value == item.email){
						$(buildHashAutorFieldById(id)).val(item.nome);
						$(buildHashEmailFieldById(id)).val(item.email);
						foundId = true;

						$(buildHashAutorFieldById(id)).addClass('disable-resumo-inputs-effect');
						$(buildHashEmailFieldById(id)).addClass('disable-resumo-inputs-effect');

						$.notify("Autor incluído com sucesso!", "success");

						return false;
					}else{
						foundId 	= false;
					}

				});

				if(!foundId){
					console.log('Não foi encontrado o email no banco de dados!');
					console.log('Email -> ' + emailField.value);
					$.notify("Não foi encontrado o email no banco de dados!", "warn");
				}

		}

		function buildEmailFieldById(id){
			return "email"+id;
		}

		function buildAutorFieldById(id){
			return "autor"+id;
		}

		function buildHashEmailFieldById(id){
			return "#"+buildEmailFieldById(id)
		}

		function buildHashAutorFieldById(id){
			return "#"+buildAutorFieldById(id)
		}


	</script>
</head>

<body>
	<div id="dados" style="display: none"></div>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />
        
          <div id='cssmenu'>
              <ul>
                  <li class='active'><a href='#'>Inscrição no evento</a></li>
              </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>

		<span id="small-button-class" class="small-button-back-class" onclick="javascript:location.href='perfil.php'"> voltar </span>

        <fieldset>
			<legend> Cadastro de Resumo </legend>
	        <div>
			    <form id="register-form" name="register-form" method="post" action="confirma_resumo_controller.php"  novalidate="novalidate">
					<div>
						<p id="effect" class="ui-corner-all">

							Escreva as informações para o envio do resumo nos campos abaixo.
							Ao lado de cada item, você vai encontrar balões explicativos sobre o que deve ser colocado em cada campo.
							</p>
					</div>			

					<div class="info-resumo">Lembre-se o título descreve claramente o seu trabalho</div>
					<div class="rotulo-resumo">Titulo</div>
					<div class="input-resumo"><input type="text" id="titulo" name="titulo" size="100" maxlength="250"  /></div>

	                <div class="info-resumo">Escolha o tipo do apresentação</div>
					<div class="rotulo-resumo">Tipo</div>
                    <div class="select-tiporesumo">
                        <select id="tipo" name="tipo">
                                <?php
                                $str = "";

                                foreach($tipoAtividadeRepository->findAll() as $row) {
                                    $str .= "<option value='" . $row['id'] . "'>" . $row['descricao'] . "</option>";
                                }
                                echo $str;
                                ?>
                        </select>
                    </div>
					<br/>

				  	<div class="info-resumo-email">O autor principal já está selecionado. Informe os e-mails dos outros autores. </div>
					<br/>
				  	<table id="table-authors-wrapper">
				    <thead>
				        <tr>
				           		<th id="table-author-col">Autor</th>
								<th id="table-author-email">E-mail</th>
								<th id="table-author-name">Nome Completo</th>

				        </tr>
				    </thead>
				  	
				    <tbody>
				        <tr>
				            <td colspan="3">
							        <div id="table-authors-container" class="scrollit">
							            <table id="table-authors">
							                <tr>
												<td> Autor (1) </td>
												<td> <input class="disable-resumo-inputs disable-resumo-inputs-effect"  type="text" id="email1" name="email[]" size="40" maxlength="255" readonly="readonly" value="<?php echo $session->get('email'); ?>" /> </td>
												<td> <input class="disable-resumo-inputs disable-resumo-inputs-effect" style="cursor: not-allowed" type="text" id="autor1" name="autor[]" size="40" maxlength="255" readonly="readonly"  value="<?php echo $session->get('nome'); ?>" /> </td>
											</tr>

							                <tr>
												<td> Autor (2) </td>
												<td> <input type="text" id="email2" name="email[]" size="40" maxlength="255" /> </td>
												<td> <input class="disable-resumo-inputs" style="cursor: not-allowed" type="text" id="autor2" name="autor[]" size="40" maxlength="255" readonly="readonly" /> </td>
												<td> <button  class="button button-find" type="button" onclick="searchOnJsonList('2');">Buscar</button> </td>
											</tr>

											<tr>
												<td> Autor (3) </td>
												<td> <input type="text" id="email3" name="email[]" size="40" maxlength="255" /> </td>
												<td> <input class="disable-resumo-inputs" style="cursor: not-allowed" type="text" id="autor3" name="autor[]" size="40" maxlength="255" readonly="readonly" /> </td>
												<td> <button  class="button button-find" type="button" onclick="searchOnJsonList('3');">Buscar</button> </td>
											</tr>

											<tr>
												<td> Autor (4) </td>
												<td> <input type="text" id="email4" name="email[]" size="40" maxlength="255" /> </td>
												<td> <input class="disable-resumo-inputs" style="cursor: not-allowed" type="text" id="autor4" name="autor[]" size="40" maxlength="255" readonly="readonly" /> </td>
												<td> <button  class="button button-find" type="button" onclick="searchOnJsonList('4');">Buscar</button> </td>
											</tr>

											<tr>
												<td> Autor (5) </td>
												<td> <input type="text" id="email5" name="email[]" size="40" maxlength="255" /> </td>
												<td> <input class="disable-resumo-inputs" style="cursor: not-allowed" type="text" id="autor5" name="autor[]" size="40" maxlength="255" readonly="readonly" /> </td>
												<td> <button  class="button button-find" type="button" onclick="searchOnJsonList('5');">Buscar</button> </td>
											</tr>
							            </table>
							        </div>
				                </td>
				        </tr>
				    </tbody>
				</table>
				<button  class="button button-right" type="button" onclick="evs.addNewAuthorRowToTable();">Novo autor</button>
				<br/> <br/> <br/>

				<div class="info-resumo-orientador">Escolha o orientador</div>
				<br/>
				<div class="rotulo-resumo">Orientador</div>
				<div class="select-orientador">
					<select id="orientador" name="orientador">
						<?php
						$str = "";

						foreach($orientadorRepository->findAll() as $row) {
							$str .= "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
						}
						echo $str;
						?>
					</select>
				</div>
					<br/><br/>

	                <div class="info-resumo"> &nbsp; Informe seu resumo aqui, com Contexto, Lacuna de pesquisa, Objetivo, Metodologia, Resultado e Conclusão.
	                </div>
					<div class="rotulo-resumo">Resumo</div>
					<br/>
					<div class="input-resumo"><textArea id="texto" name="texto" cols="100" rows="7"></textArea></div>
					
					<div class="info-resumo">Adicone pelo menos três palavras-chave que caracterizem o seu trabalho. 
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