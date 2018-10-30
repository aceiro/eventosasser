<?php
require_once("../cfg/Session.php");
require_once("../constants/asser_eventos_constants.php");
require_once '../repositorio/models/Trabalho.php';

require_once '../repositorio/facade/EventosAsserFacade.php';

$resumoId = $_POST['id'];
$session = new Session(SESSION_SERVER_ID);
$trabalhoRepository     = EventosAsserFacade::createTrabalhoRepository();
$orientadorRepository   = EventosAsserFacade::createOrientadorRepository();
$participanteTrabalhoRepository = EventosAsserFacade::createParticipanteTrabalhoRepository();

header("Content-Type: text/html; charset=UTF-8", true);

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="cache-control" content="no-store"/>
    <link rel="shortcut icon" href="../../favicon.ico">
    <title>Asser Eventos</title>

    <!-- adicionado o suporte para o jquery e thema redmond -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- adicionado o suporte para o bootstrap padrão  -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- outros suporte a css da página -->
    <link rel="stylesheet" href="../html/css/menu-styles-v1.0.0.css" type="text/css">
    <link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">


    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../html/scripts/asser-main-menu.js"></script>
    <script src="../html/scripts/asser-commum.js"></script>

    <link rel="stylesheet" href="../html/scripts/tablesorter/blue/style.css" type="text/css"
          media="print, projection, screen">
    <link rel="stylesheet" href="../html/css/teacher-evaluation-style.css" type="text/css">
    <script type="text/javascript" src="../html/scripts/tablesorter/jquery.tablesorter.js"></script>
</head>

<script>
    $(function () {

    });
</script>

<body>
<div id="corpo">

    <div id="cabecalho">
    </div>

    <br/>

    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='professor_perfil.php'>Voltar</a></li>
        </ul>
    </div>

    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>
    <div class="welcome-login" style="margin-bottom: 80px;">
        <span id="small-button-class" class="small-button-class"
              onclick="javascript:location.href='professor_perfil.php'"> Voltar </span>
    </div>
    <br/>


    <form id="register-form"
          name="register-form" method="post"
          action="confirma_resumo_controller.php" novalidate="novalidate">
        <fieldset>
            <legend>Avaliar Resumo</legend>
            <?php

            $trabalho = $trabalhoRepository->findOne($resumoId);

            $idTrabalho = $trabalho->id;
            $titulo         = $trabalho->titulo;
            $resumo         = $trabalho->resumo;
            $palavrasChave  = $trabalho->palavras_chave;
            $status         = $trabalho->status_r;
            $comentarios    = $trabalho->comentarios;
            $idOrientador   = $trabalho->id_orientador;

            $orientador     = $orientadorRepository->findOne($idOrientador);
            $nomeOrientador = $orientador->nome;

            $autores        = $participanteTrabalhoRepository->findAutoresByTrabalhoId($idTrabalho);
            $autorLista     = "";

            $autorSize      = count($autores);
            $pos            = 1;
            foreach ($autores as $autor) {
                $autorLista.= ' '. $autor['nome']. ' - ' . $autor['email'] ;
                $pos++;
                if($pos <= $autorSize)
                    $autorLista.=';';
            }

            ?>

            <p style="text-align: center; font-size: x-large; font-weight: bold">  <?= $titulo ?> </p>
            <p style='text-align: center; font-size: small'> <?=$autorLista;?> </p>

            <p style='text-align: center; font-size: small'> (O) <?=$nomeOrientador;?> </p>
            <p style='text-align: center; font-size: large; margin-top: 5px'> RESUMO </p>

            <p style='text-align: justify; margin-left: 50px; margin-right: 50px; font-size: medium '>  <?= $resumo ?> </p>

            <p style='text-align: left; font-size: large; font-weight: bold; margin-left: 50px;'>
                Palavras-chave: <?= $palavrasChave; ?> </p>

            <div>
                <label>Comentários</label>
                <textArea name="comentarios" rows="8" cols="80" /><?= $comentarios; ?></textArea>
            </div>

            <div>
                <label>Status do trabalho</label>
                <select id="status" name="status"/>
                <option value="1">Aprovado</option>
                <option value="2">Reenvio</option>
                <option value="3">Reprovado</option>
                </select>
            </div>

            <input type="hidden" name="id" value="<?= $idTrabalho; ?>"/>

            <div class="text-align-center">
                <input class="button button-center" name="cadastrar" type="submit" id="cadastrar" value="Enviar"/>
                <input class="button button-center" name="limpar" type="reset" id="limpar" value="Limpar"/>
            </div>
        </fieldset>
    </form>
    <br/>

    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos
            os direitos reservados Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    </div>
</div>
</body>
</html>