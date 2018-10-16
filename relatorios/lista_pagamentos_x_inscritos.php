<?php
	require_once("../cfg/Session.php");
	$session = new Session(SESSION_SERVER_ID);

	include_once('../utils/common.php');

	require_once '../constants/asser_eventos_constants.php';
    require_once '../repositorio/InscricaoRepository.php';
    require_once '../repositorio/facade/EventosAsserFacade.php';

    $inscricaoRepository     = EventosAsserFacade::createInscricaoRepository();


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
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

	<script src="../html/scripts/notify.min.js"></script>



	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	 


	<link rel="stylesheet" href="../html/css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../html/css/estilo.css" type="text/css">
	<link rel="stylesheet" href="../html/css/list-student-style.css" type="text/css">


	<script src="../html/scripts/asser-main-menu.js"></script>
	<script src="../html/scripts/asser-list-student.paper-1.0.1.js"></script>



	<script type="application/javascript">
		$(document).ready(function() {

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
				<li class='active'><a href='#'>Inscrição no evento</a></li>
			</ul>
	 	</div>


		<!-- adiciona o suporte ao separador gradiente -->
		<div id="mmenu"> &nbsp;</div>
		<div id="mmenubar"> &nbsp;</div>
		<div id="mmenusubbar"> &nbsp;</div>
		<div id="mmenusubsubbar"> &nbsp;</div>

		<span id="small-button-class" class="small-button-back-class" onclick="javascript:location.href='../adm/secretaria_perfil.php'"> voltar </span>

        <div id="listar-coteudo">

                <table id="table-hover">
					<caption><strong>Lista de Pagamentos X Inscritos </strong><br>
					</caption>
					<th>EMAIL</th><th>NOME</th><th>CURSO</th><th>DATA</th><th>VALOR</th></th>
					<?php


						$strRow = '<tr><td>{EMAIL}</td><td>{NOME}</td><td>{CURSO}</td><td>{DATA}</td><td>{VALOR}</td></tr>';

						foreach ($inscricaoRepository->findAllPagantesInscritos() as $row) {

							$strRowEmail   = str_replace("{EMAIL}" ,	$row['email'], 			 $strRow);
							$strRowNome    = str_replace("{NOME}"  , 	$row['nome'],   		 $strRowEmail);
							$strRowCurso   = str_replace("{CURSO}" ,  	$row['nome_curso'],      $strRowNome);
							$strRowStatus  = str_replace("{DATA}"  , 	$row['data_pagamento'],  $strRowCurso);
							$strRowValor   = str_replace("{VALOR}" ,    fmtBrazilianMoney( $row['valor'] ),  	$strRowStatus);
							$rowFormated   = $strRowValor;
							echo $rowFormated;
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