<?php

header('Content-Type: text/html; charset=UTF-8');

//require_once("../constants/AsserEventosConstants.php");
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
        <!-- botão sair é aqui-->
    </div>

    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>
    <div class="welcome-login" style="margin-bottom: 80px;">
        <span id="small-button-class" class="small-button-class" onclick="javascript:location.href='loggout.php'"> Sair </span>
    </div>

    <div style="padding: 50px; margin-bottom: 50px; height: 120px;">

        <div style="height: 150px; width: 70%; float: left; margin-left: 15%;">

            <div class="text-align-center">
                <br/>
                <div class="text-align-center" style="height: 35px;"><strong>Confirmação de Pagamento:</strong></div>
                <div style="height: 35px;">
                    <?php
                        $socket = fsockopen('udp://pool.ntp.br', 123, $err_no, $err_str, 1);
                        date_default_timezone_set('America/Sao_Paulo');
                        if ($socket)
                        {
                            if (fwrite($socket, chr(bindec('00'.sprintf('%03d', decbin(3)).'011')).str_repeat(chr(0x0), 39).pack('N', time()).pack("N", 0)))
                            {
                                stream_set_timeout($socket, 1);
                                $unpack0 = unpack("N12", fread($socket, 48));
                                $dia = date('d-m-Y', $unpack0[7]);
                                $hora = date('H:i:s', $unpack0[7]);
                            }
                            fclose($socket);
                        }
                        echo 'Rio Claro, ' . $dia . '<br />';
                        echo "<p align='justify'>Declaro ter recebido de " . $session->get('inscrito') . ' às ' . $hora . ' a importância de R$ 20,00 referente a taxa de inscrição no evento. </p><br />';
                        echo '________________________<br />  ';
                        echo 'Carimbo e Assinatura';
                        $session->destroy();
                    ?>
                </div>
            </div>
       </div>
    </div>
    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
    </div>
</div>
</body>
</html>