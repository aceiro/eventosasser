<?php
	require_once("../cfg/Session.php");
	$session = new Session(SESSION_SERVER_ID);

	include_once('../utils/common.php');

    require_once '../repositorio/models/Trabalho.php';
    require_once '../repositorio/models/Curso.php';
    require_once '../repositorio/models/Participante.php';

    require_once '../repositorio/TrabalhoRepository.php';
    require_once '../repositorio/CursoRepository.php';
    require_once '../repositorio/ParticipanteRepository.php';

    require_once '../repositorio/facade/EventosAsserFacade.php';

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
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

	<script src="../html/scripts/notify.min.js"></script>



	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


	<link rel="stylesheet" href="../html/css/menu-styles-v1.0.0.css" type="text/css">
	<link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">
	<link rel="stylesheet" href="../html/css/list-student-style.css" type="text/css">


	<script src="../html/scripts/asser-main-menu.js"></script>
	<script src="../html/scripts/asser-list-student.paper-1.0.2.js"></script>




</head>

<body>
	<div style="display: none; font-size: inherit;" id="dialog-confirm" title="Confirmação">
		<p style="margin-top: 15px "><span class="ui-icon ui-icon-alert" style="float:left; margin: 0 15px 25px 0;"></span>Deseja realmente remover esse resumo ? </p>
	</div>

	<div id="corpo">
    	
		<div id="cabecalho">
    	</div>
        
        <br />
        
       <!-- menu da aplicacao -->
      <div id='cssmenu'>
			<ul>
				<li class='active'><a href='#'>Inscrição</a></li>
			</ul>
	 	</div>


		<!-- adiciona o suporte ao separador gradiente -->
		<div id="mmenu"> &nbsp;</div>
		<div id="mmenubar"> &nbsp;</div>
		<div id="mmenusubbar"> &nbsp;</div>
		<div id="mmenusubsubbar"> &nbsp;</div>

		<span id="small-button-class" class="small-button-back-class" onclick="javascript:location.href='../resumo/perfil.php'"> voltar </span>

        <div id="listar-coteudo">

                <table id="table-hover">

					<th>ANO</th><th>EVENTO</th><th colspan="3">DOWNLOAD</th></th>
					<tr></tr><td>2019</td><td>XI - Mostra de Iniciação Científica 2019</td><td><a href="gerar_certificado_controller.php?y=2019&e='<?php echo base64_encode($session->get(SESSION_KEY_EMAIL));?>'"> <img width="50px" src="../imagens/pdf-icon.png"/></a></td></tr>
					<tr></tr><td>2018</td><td>X - Mostra de Iniciação Científica 2018</td><td><a href="gerar_certificado_controller.php?y=2018&e='<?php echo base64_encode($session->get(SESSION_KEY_EMAIL));?>'"> <img width="50px" src="../imagens/pdf-icon.png"/></a></td></tr>
                    <tr></tr><td>2017</td><td>IX - Mostra de Iniciação Científica 2017</td><td><a href="gerar_certificado_controller.php?y=2017&e='<?php echo base64_encode($session->get(SESSION_KEY_EMAIL));?>'"> <img width="50px" src="../imagens/pdf-icon.png"/></a></td></tr>
                    <tr></tr><td>2016</td><td>VIII - Mostra de Iniciação Científica 2016</td><td><a href="gerar_certificado_controller.php?y=2016&e='<?php echo base64_encode($session->get(SESSION_KEY_EMAIL));?>'"> <img width="50px" src="../imagens/pdf-icon.png"/></a></td></tr>
				</table>

        </div>
        
        <br />
     <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>