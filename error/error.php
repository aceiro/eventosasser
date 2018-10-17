<?php
    header('Content-Type: text/html; charset=iso-8859-1'); /* hack to be used on redirect*/

    require_once '../constants/asser_eventos_constants.php';
    require_once '../cfg/Session.php';
    require_once '../repositorio/models/Log.php';
    require_once '../repositorio/facade/EventosAsserFacade.php';

    $logRepository = EventosAsserFacade::createLogRepository();

    $session   = new Session(SESSION_SERVER_ID);
    $message   = ($session->get(SESSION_MESSAGE_ERROR)==NULL ? "Mensagem de erro nula" : $session->get(SESSION_MESSAGE_ERROR) );
    $email     = $session->get(SESSION_KEY_EMAIL);
    $errorCode = $session->get(SESSION_ERROR_CODE);
    $dataLog   = date("Y-m-d H:i:s");

    $logId = $logRepository->save(new Log($message, -1, $email, $dataLog));
    $session->destroy();

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store" />
    <link rel="shortcut icon" href="../../favicon.ico">
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


    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>

    <br />
    <span id="small-button-class" class="small-button-class" onclick="javascript:location.href='../index.html'"> voltar </span>
    <br />
    <br />

    <div id="texto">
        <div class="message-payment-success">
            <div class="message-payment-detail-alert">
                <?php
                    switch($errorCode){
                        case ERROR_CODE_GENERAL:
                            $m = '<strong>  <p> Opera��o inv�lida no Sistema de Eventos, favor contactar os administradores do sistema. </p> </strong> ID de erro:';
                            $m = $m .  $logId;
                            echo $m;
                            break;
                        case ERROR_CODE_EMAIL_EXISTING:
                            $m = '<strong>  <p> O endere�o de e-mail j� existente no banco de dados, fa�a o cadastro com outro endere�o </p> </strong> ID de erro:';
                            $m = $m .  $logId;
                            echo $m;
                            break;
                        default:
                            $m = '<strong>  <p> Opera��o inv�lida no Sistema de Eventos, favor contactar os administradores do sistema. </p> </strong> ID de erro:';
                            $m = $m .  $logId;
                            echo $m;
                    }
                ?>

            </div>


        </div>
    </div>

    <br />
    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 � 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informa��o </a> </p>
    </div>
</div>
</body>
</html>