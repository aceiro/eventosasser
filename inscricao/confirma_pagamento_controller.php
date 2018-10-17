<?php
    require_once("../constants/asser_eventos_constants.php");
    require_once("../cfg/Session.php");
    require_once '../repositorio/facade/EventosAsserFacade.php';

    header('Content-Type: text/html; charset=iso-8859-1');

    $session    = new Session(SESSION_SERVER_ID);
    $repository = EventosAsserFacade::createInscricaoRepository();

    $email      = $session->get(SESSION_KEY_EMAIL);


    if( $repository->existsPagamentoByEmail($email) ){
        header( "Location: confirma_inscricao_sucesso.php", true);
    }else{
        header( "Location: confirma_inscricao_invalida.php", true);
    }
    exit;