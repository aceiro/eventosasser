<?php

    header("Content-Type: text/html; charset=UTF-8", true);
    require_once("../cfg/Session.php");
    $session = new Session(SESSION_SERVER_ID);

    require_once '../repositorio/facade/EventosAsserFacade.php';
    $participanteRepository = EventosAsserFacade::createParticipanteRepository();
    $participantes          = $participanteRepository->findAllParticipantesForPayment();
    $json                   = json_encode($participantes);
    print_r($json);
    



