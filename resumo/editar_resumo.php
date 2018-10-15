<?php
    require_once ('../cfg/Session.php');
    require_once ('../repositorio/models/TipoAtividade.php');
    require_once ('../repositorio/TipoAtividadeRepository.php');
    require_once ('../repositorio/facade/EventosAsserFacade.php');

    $session = new Session("EventosAsser2016");
	$id 	 = $_GET['id'];

    $tipoAtividadeRepository = EventosAsserFacade::createTipoAtividadeRepository();
	$orientadorRepository    = EventosAsserFacade::createorientadorRepository();
	$trabalhoRepository      = EventosAsserFacade::createTrabalhoRepository();
	$participanteRepository  = EventosAsserFacade::createParticipanteTrabalhoRepository();

	$trabalho = $trabalhoRepository->findOne($id);
	$autores  = $participanteRepository->findAutoresByTrabalhoId($id);


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

		<span id="small-button-class" class="small-button-back-class" onclick="javascript:location.href='../relatorios/lista_resumos_x_participantes.php'"> voltar </span>

        <fieldset>
			<legend> Cadastro de Resumo </legend>
	        <div>
			    <form id="register-form" name="register-form" method="post" action="edita_resumo_controller.php"  novalidate="novalidate">
					<input type="hidden" name="trabalho_id" value=<?=$id;?> >
					<div>
						<p id="effect" class="ui-corner-all">
							<strong> Atenção!</strong> Faça a edição do seu resumo. Para isso, verifique os pontos e comentários do revisor abaixo.
						</p>

						<p id="effect" class="ui-corner-all">
							<strong> Revisor (1) </strong>
							<?=$trabalho->comentarios; ?>
						</p>


					</div>


					<div class="info-resumo">Lembre-se o título descreve claramente o seu trabalho</div>
					<div class="rotulo-resumo">Titulo</div>
					<div class="input-resumo"><input type="text" id="titulo" name="titulo" size="100" maxlength="250" value="<?php echo $trabalho->titulo; ?>" /></div>

	                <div class="info-resumo">Escolha o tipo do resumo</div>
					<div class="rotulo-resumo">Tipo</div>
                    <div class="select-tiporesumo">
                        <select id="tipo" name="tipo">
                                <?php
                                $str = "";

                                foreach($tipoAtividadeRepository->findAll() as $row) {
									$selected='';
									if($row['id']==$trabalho->id_tipoatividade) {
										$selected = 'selected';
									}

									$str .= "<option value='" . $row['id'] . "' $selected >" . $row['descricao'] . "</option>";
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

											<?php
												$ROW_TEMPLATE =
													'<tr>
														<td> Autor ({AUTOR_ID}) </td>
														<td> <input type="text" id="email{EMAIL_ID}" name="email[]" size="40" maxlength="255" value="{AUTOR_EMAIL}"/> </td>
														<td> <input class="disable-resumo-inputs" style="cursor: not-allowed" type="text" id="autor2" name="autor[]" size="40" maxlength="255" readonly="readonly" value="{AUTOR_NOME}"/> </td>
														<td> <button  class="button button-find" type="button" onclick=searchOnJsonList(\'{EVENT_ID}\');>Buscar</button> </td>
													</tr>';

												array_shift($autores);
												if( count($autores)==0 ) {
													// add plus four rows
													// return if there is nothing
													for($id=2; $id<=5; $id++) {
														$buildAutorTag = str_replace('{AUTOR_ID}',$id, $ROW_TEMPLATE);
														$buildEmailTag = str_replace('{EMAIL_ID}',$id, $buildAutorTag);
														$buildEventTag = str_replace('{EVENT_ID}',$id, $buildEmailTag);
														$buildAutorNomeTag  = str_replace('{AUTOR_NOME}','', $buildEventTag);
														$buildAutorEmailTag = str_replace('{AUTOR_EMAIL}','', $buildAutorNomeTag);
														echo $buildAutorEmailTag;
													}
												}else{
													// otherwise, there are more authors
													// so rendering each of rows with authors
													$id=2;
													foreach ($autores as $key => $value) {
														$buildAutorTag = str_replace('{AUTOR_ID}',$id, $ROW_TEMPLATE);
														$buildEmailTag = str_replace('{EMAIL_ID}',$id, $buildAutorTag);
														$buildEventTag = str_replace('{EVENT_ID}',$id, $buildEmailTag);
														$buildAutorNomeTag  = str_replace('{AUTOR_NOME}',$value['nome'], $buildEventTag);
														$buildAutorEmailTag = str_replace('{AUTOR_EMAIL}',$value['email'], $buildAutorNomeTag);
														echo $buildAutorEmailTag;
														$id++;
													}
												}
											?>
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
                        $str = "<option value=''> NÃO SELECIONADO</option>";
						foreach($orientadorRepository->findAll() as $row) {
							$selected='';
							if($row['id']==$trabalho->id_orientador) {
								$selected = 'selected';
							}

							$str .= "<option value='" . $row['id'] . "' $selected>" . $row['nome'] . "</option>";
						}
						echo $str;
						?>
					</select>
				</div>

                    <br/><br/>

                    <div class="info-resumo-orientador">Co-orientador é um segundo orientador que auxiliou no desenvolvimento do trabalho em igual valor ao orientador principal</div>
                    <br/>
                    <div class="rotulo-resumo">Co-orientador</div>
                    <div class="select-orientador">
                        <select id="coorientador" name="coorientador">
                            <?php
                            $str = "<option value=''> NÃO SELECIONADO</option>";

                            foreach($orientadorRepository->findAllCoorientadores() as $row) {
                                $selected='';
                                if($row['id']==$trabalho->id_coorientador) {
                                    $selected = 'selected';
                                }

                                $str .= "<option value='" . $row['id'] . "' $selected>" . $row['nome'] . "</option>";
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
					<div class="input-resumo"><textArea id="texto" name="texto" cols="100" rows="7"> <?=$trabalho->resumo?> </textArea></div>
					
					<div class="info-resumo">Adicone pelo menos três palavras-chave que caracterizem o seu trabalho. 
					Coloque as palavras-chave separadas por ponto-e-virgula. Por exemplo, <strong>Sistema Toyota; Administração de Empresas; Gestão</strong></div>
					<div class="rotulo-resumo">Palavras-chave</div>
					<div class="input-resumo"><input type="text" id="keyword" name="keyword" size="100" maxlength="95" value="<?php echo $trabalho->palavras_chave;?>" /></div>
					
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