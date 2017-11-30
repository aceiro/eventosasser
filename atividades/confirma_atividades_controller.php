<?php
    require_once("../constants/asser_eventos_constants.php");
    require_once("../cfg/Session.php");
    require_once '../repositorio/models/Atividades.php';
    require_once '../repositorio/facade/EventosAsserFacade.php';

    header('Content-Type: text/html; charset=iso-8859-1');

    $session    = new Session("EventosAsser2016");
    $atividadesRepository   = EventosAsserFacade::createAtividadesRepository();
    $participanteRepository = EventosAsserFacade::createParticipanteRepository();

    if( is_null($_POST['cursos']) ){
        header( "Location: index.php", true);
    }

    $participanteByEmail = $participanteRepository->findParticipanteByEmail( $session->get(SESSION_KEY_EMAIL) );
    $atividadesRepository->removeAllActivitiesByParticipanteId( $participanteByEmail->id );

    foreach ($_POST['cursos'] as $key => $id_atividade ){
        $atividadesRepository->save(new Atividades(null, $participanteByEmail->id, $id_atividade, 1));
    }

    header( "Location: index.php", true);
    exit;