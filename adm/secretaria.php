<?php

    header('Content-Type: text/html; charset=UTF-8');

    require_once("../constants/AsserEventosConstants.php");
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Asser Eventos</title>
    <!-- adicionado o suporte para o jquery e thema redmond -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- outros suporte a css da p�gina -->
    <link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../scripts/asser-main-menu.js"></script>
    <script src="../scripts/asser-commum.js"></script>
    <script src="../scripts/notify.min.js"></script>

</head>
<body>
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

    <div style="padding: 50px; margin-bottom: 50px; height: 300px;">
        <div id="cadastro_resumo" style="height: 150px; width: 33%; float: left;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="login"
                      name="login" method="post"
                      action="professor.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/revisado.png" height="70px" width="70px"></div>
                        <input class="button button-center" name="revisar" type="submit" id="cadastro-resumo-button" value="Professor Avaliador" />
                    </div>
                </form>
            </fieldset>
        </div>
        <div style="height: 150px; width: 33%; float: left;">
            <fieldset style="background-color: #e6EEEE; width: 80%">
                <form id="lista-resumos"
                      name="secretaria" method="post"
                      action="secretaria.php.php"  novalidate="novalidate">
                    <div class="text-align-center">
                        <br/>
                        <div><img src="../imagens/payment.png" height="70px" width="70px"></div>
                        <div class="text-align-center">
                            <input class="button button-center" name="resumo" type="submit" id="resumo" value="Registrar Pagamento" />
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>

    </div>

    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
    </div>
</div>
</body>
</html>