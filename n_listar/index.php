<?php
	require_once("../cfg/Session.php");
	$session = new Session("EventosAsser2016");

	include_once('../utils/common.php');

    require_once '..\repositorio\models\Trabalho.php';
    require_once '..\repositorio\models\Curso.php';
    require_once '..\repositorio\models\Participante.php';

    require_once '..\repositorio\TrabalhoRepository.php';
    require_once '..\repositorio\CursoRepository.php';
    require_once '..\repositorio\ParticipanteRepository.php';

    require_once '..\repositorio\facade\EventosAsserFacade.php';

    $trabalhoRepository     = EventosAsserFacade::createTrabalhoRepository();
    $cursoRepository        = EventosAsserFacade::createCursoRepository();
    $participanteRepository = EventosAsserFacade::createParticipanteRepository();

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


	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	 


	<link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css">
	<link rel="stylesheet" href="../css/list-student-style.css" type="text/css">


	<script src="../scripts/asser-main-menu.js"></script>
	<script src="../scripts/asser-list-student.paper-1.0.0.js"></script>
	<script type="application/javascript">
		$(document).ready(function() {
			var alp = ASSER.liststudentpaper;
				alp.init();
        	}
		);
	</script>
</head>

<body>
	<div id="corpo">
    	
		<div id="cabecalho">
    	</div>
        
        <br />
        
       <!-- menu da aplicacao -->
      <div id='cssmenu'>
			<ul>
			   <li><a href='../index.html'>Evento</a></li>	
			   <li class='active'><a href='../submissao3.html'>Submissão de Trabalhos</a></li>
			   <li><a href='../palestra'>Palestras</a></li>
			   <li><a href='../programa.html'>Programação</a></li>			   
			   <li> <a href='../anais'>Edições<br>Anteriores</a></li>  
			   <li><a href='../contato'>Contato</a></li>
			   <li><a href='../creditos.html'>Créditos</a></li>
			</ul>
	 	</div>

		<!-- adiciona o suporte ao separador gradiente -->
		<div id="mmenu"> &nbsp;</div>
		<div id="mmenubar"> &nbsp;</div>
		<div id="mmenusubbar"> &nbsp;</div>
		<div id="mmenusubsubbar"> &nbsp;</div>

		<br />
		<span id="small-button-class" class="small-button-class" onclick="javascript:location.href='../cad_usuario/perfil.php'"> voltar </span>
		<br />   
        
        <div id="listar-coteudo">

                <table id="table-hover">
					<caption><strong>Lista de Resumos submetidos </strong><br>
					</caption>
					<th>ID</th><th>TÍTULO</th><th>CURSO</th><th>STATUS</th>
					<?php

						require_once '../constants/AsserEventosConstants.php';
						$email  = $session->get(SESSION_KEY_EMAIL);
						$strRow = '<tr></tr><td>{ID}</td><td>{TITULO}</td><td>{CURSO}</td><td>{STATUS}</td></tr>';

						foreach ($trabalhoRepository->findAllTrabalhosByEmail($email) as $row) {
							$status = $row['status'];
							switch($status){
								case RESUMO_STATUS_ENVIADO:{
									$result="<span class=\"glyphicon glyphicon-list-alt\"></span><br/> Enviado";
									break;
								}
								case RESUMO_STATUS_APROVADO:{
									$result="<span class=\" glyphicon glyphicon-ok-circle\"></span><br/>Aprovado";
									break;
								}
								case RESUMO_STATUS_REENVIAR:{
									$result="<span class=\" glyphicon glyphicon-ban-circle\"></span><br/>Re-enviar";
									break;
								}
								case RESUMO_STATUS_REPROVADO:{
									$result="<span class=\" glyphicon glyphicon-remove-circle\"></span><br/>Reprovado";
									break;
								}
								case RESUMO_STATUS_CORRIGIDO:{
									$result="<span class=\" glyphicon glyphicon glyphicon-pencil\"></span><br/>Corrigido";
									break;
								}
								default:{
									$result="-";
								}
							}



							$strRowId 	  = str_replace("{ID}", $row['id'], $strRow);
							$strRowTitulo = str_replace("{TITULO}", $row['titulo'], $strRowId);
							$strRowCurso  = str_replace("{CURSO}",  $row['curso'],  $strRowTitulo);
							$strRowStatus = str_replace("{STATUS}", $result,  		$strRowCurso);
							echo $strRowStatus;
						}
					?>
				</table>

        </div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>