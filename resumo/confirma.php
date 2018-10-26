<?php
	header("Content-Type: text/html; charset=UTF-8", true);

	require_once("../constants/asser_eventos_constants.php");
	require_once("../cfg/Session.php");
	include_once('../utils/common.php');

	$session = new Session(SESSION_SERVER_ID);

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
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	

	<script src="../html/scripts/asser-main-menu.js"></script>
	<script src="../html/scripts/asser-commum.js"></script>
	

	<link rel="stylesheet" href="../html/css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">
</head>
<body>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />
        
          <div id='cssmenu'>
              <ul>
                  <li><a href='../index.html'>Evento</a></li>
                  <li class='active'><a href='../index.html'>Inscrição no evento</a></li>
                  <li><a href='../programa.html'>Programação</a></li>
                  <li> <a href='../anais'>Edições<br>Anteriores</a></li>
                  <li><a href='../contato'>Contato</a></li>
                  <li><a href='../comissao.html'>Créditos</a></li>
              </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>

        <br />
        
        <div id="texto">
            	<fieldset>
				<legend>Cadastro realizado com sucesso!</legend>
				<br />
				
				<p id="effect" class="ui-corner-all">Agora você deve acompanhar o andamento da avaliação do seu resumo.</p>

				<div class="rotulo-resumo"><strong>Salve e imprima os dados de acesso para acompanhar o <strong>status</strong> do seu resumo</strong></div>
				<div class="deail-final-resumo">
					E-mail cadastrado <strong><?php echo $session->get(SESSION_KEY_EMAIL); ?></strong> <br />
				</div>

			</fieldset>
			<div class="text-align-center">
              		<button class="button button-center" onclick="javascript:location.href='perfil.php'" />  Voltar </button>
              		<button class="button button-center"  onclick="javascript:location.href='../relatorios/lista_resumos_x_participantes.php'" /> Verificar Resumo </button>
             </div>
		</div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>