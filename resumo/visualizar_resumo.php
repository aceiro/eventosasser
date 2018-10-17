<?php
    require_once ('../cfg/Session.php');
    require_once ('../repositorio/models/TipoAtividade.php');
    require_once ('../repositorio/TipoAtividadeRepository.php');
    require_once ('../repositorio/facade/EventosAsserFacade.php');

    $session = new Session(SESSION_SERVER_ID);
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
	<link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">

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
			    <form id="register-form" name="register-form" method="post" action="#"  novalidate="novalidate">
					<input type="hidden" name="trabalho_id" value=<?=$id;?> >
					<div>
						<p id="effect" class="ui-corner-all">
							<strong> Atenção!</strong> Apenas o autor principal pode editar o resumo.
						</p>

						<p id="effect" class="ui-corner-all">
							<strong> Revisor (1) </strong>
							<?=$trabalho->comentarios; ?>
						</p>


					</div>


					<div class="info-resumo">Lembre-se o título descreve claramente o seu trabalho</div>
					<div class="rotulo-resumo">Titulo</div>
					<div class="input-resumo"><input type="text" id="titulo" name="titulo" size="100" maxlength="250" value="<?php echo $trabalho->titulo; ?>" disabled /></div>

	                <div class="info-resumo">Escolha o tipo do resumo</div>
					<div class="rotulo-resumo">Tipo</div>
                    <div class="select-tiporesumo">
                        <select id="tipo" name="tipo" disabled>
                                <?php
                                $str = "";

                                foreach($tipoAtividadeRepository->findAll() as $row) {
									$selected='';
									if($row['id']==$trabalho->id_tipoatividade) {
										$selected = 'selected';
									}
                                    $str .= "<option id='". $row['id'] . "' $selected >" . $row['descricao'] . "</option>";
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
											<?php
												$ROW_TEMPLATE =
													'<tr>
														<td> Autor ({AUTOR_ID}) </td>
														<td> <input type="text" id="email{EMAIL_ID}" name="email[]" size="40" maxlength="255" value="{AUTOR_EMAIL}" disabled/> </td>
														<td> <input class="disable-resumo-inputs" style="cursor: not-allowed" type="text" id="autor2" name="autor[]" size="40" maxlength="255" readonly="readonly" value="{AUTOR_NOME}"/> </td>
													</tr>';

												$id=1;
												foreach ($autores as $key => $value) {
													$buildAutorTag = str_replace('{AUTOR_ID}',$id, $ROW_TEMPLATE);
													$buildEmailTag = str_replace('{EMAIL_ID}',$id, $buildAutorTag);
													$buildEventTag = str_replace('{EVENT_ID}',$id, $buildEmailTag);
													$buildAutorNomeTag  = str_replace('{AUTOR_NOME}',$value['nome'], $buildEventTag);
													$buildAutorEmailTag = str_replace('{AUTOR_EMAIL}',$value['email'], $buildAutorNomeTag);
													echo $buildAutorEmailTag;
													$id++;
												}

											?>
							            </table>
							        </div>
				                </td>
				        </tr>
				    </tbody>
				</table>
				<br/> <br/> <br/>

				<div class="info-resumo-orientador">Escolha o orientador</div>
				<br/>
				<div class="rotulo-resumo">Orientador</div>
				<div class="select-orientador">
					<select id="orientador" name="orientador" disabled>
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

                    <br/><br/>

                    <div class="info-resumo-orientador">Co-orientador é um segundo orientador que auxiliou no desenvolvimento do trabalho em igual valor ao orientador principal</div>
                    <br/>
                    <div class="rotulo-resumo">Co-orientador</div>
                    <div class="select-orientador">
                        <select id="coorientador" name="coorientador" disabled>
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

				</div>
					<br/><br/>

	                <div class="info-resumo"> &nbsp; Informe seu resumo aqui, com Contexto, Lacuna de pesquisa, Objetivo, Metodologia, Resultado e Conclusão.
	                </div>
					<div class="rotulo-resumo">Resumo</div>
					<br/>
					<div class="input-resumo"><textArea id="texto" name="texto" cols="100" rows="7" disabled> <?=$trabalho->resumo?> </textArea></div>
					
					<div class="info-resumo">Adicone pelo menos três palavras-chave que caracterizem o seu trabalho. 
					Coloque as palavras-chave separadas por ponto-e-virgula. Por exemplo, <strong>Sistema Toyota; Administração de Empresas; Gestão</strong></div>
					<div class="rotulo-resumo">Palavras-chave</div>
					<div class="input-resumo"><input type="text" id="keyword" name="keyword" size="100" maxlength="95" value="<?php echo $trabalho->palavras_chave;?>" disabled /></div>
					
	                 <div class="text-align-center">
	              		<input type="button" class="button button-center" name="voltar" id="voltar" value="Voltar" onclick="javascript:location.href='../relatorios/lista_resumos_x_participantes.php'"/>
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