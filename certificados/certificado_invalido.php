<?php
	require_once("../cfg/Session.php");
	require_once ("../repositorio/models/Inscricao.php");
	require_once ("../repositorio/InscricaoRepository.php");
	require_once ('../repositorio/facade/EventosAsserFacade.php');

	$session = new Session(SESSION_SERVER_ID);

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Asser Eventos</title>
    <!-- adicionado o suporte para o jquery e thema redmond -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- outros suporte a css da página -->
    <link rel="stylesheet" href="../html/css/menu-styles-v1.0.0.css" type="text/css">
    <link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../html/scripts/asser-main-menu.js"></script>
    <script src="../html/scripts/asser-commum.js"></script>

	

	<script src="../html/scripts/asser-main-menu.js"></script>
	<script src="../html/scripts/asser-commum.js"></script>
	

	<link rel="stylesheet" href="../html/css/menu-styles-v1.0.0.css" type="text/css">
	<link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">
</head>
<body>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />
        
          <div id='cssmenu'>
              <ul>
                  <li class='active'><a href='#'>Inscrição</a></li>
              </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>

		<span id="small-button-class" class="small-button-back-class" onclick="javascript:location.href='../certificados/lista_certificados_x_participantes.php'"> voltar </span>

        <div id="texto">
			<div class="message-payment-success">
				<div class="message-payment-detail-alert">
					<strong> <p> Certificado não encontrado para o e-mail informado. </p> </strong>
				</div>
				<div class="message-payment-detail">
					<strong> <p>
                            Verifique se o e-mail acessado é o mesmo usado no momento do pagamento na secretaria.
                            A geração do certificado depende da partifição do evento e do pagamento da respectiva taxa de participação.
                            <hr>
                            Em caso de dúvidas, favor em entrar em contato com secretaria da faculdade de segunda à sexta das 8:00 às 18:00 e das 19:00 às 22:00
                            </p> </strong>
				</div>
			</div>
		</div>
        
        <br />
    <div id="rodape">
              <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
      </div>
    </div>
</body>
</html>