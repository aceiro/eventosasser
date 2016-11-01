<?php

    header("Content-Type: text/html; charset=UTF-8", true);
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");

    require_once '../repositorio/facade/EventosAsserFacade.php';
    $participanteRepository = EventosAsserFacade::createParticipanteRepository();
    $participantes          = $participanteRepository->findAllParticipantesForPayment();
    $json                   = json_encode($participantes);
    print_r($json);
    



