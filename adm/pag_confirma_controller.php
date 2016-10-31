<?php
    header("Content-Type: text/html; charset=UTF-8", true);
    require_once("../cfg/Session.php");
    $session = new Session("EventosAsser2016");

    require_once '../constants/asser_eventos_constants.php';
    require_once '../repositorio/models/Inscricao.php';
    require_once '../repositorio/facade/EventosAsserFacade.php';
    $participanteRepository = EventosAsserFacade::createParticipanteRepository();
    $inscricaoRepository    = EventosAsserFacade::createInscricaoRepository();


    if(!isset($_POST ['email'])){
        echo "Email deve ser informado";
        return;
    }

    $email = $_POST ['email'];
    if( !$participanteRepository->existsParticipanteByEmail($email) ){
        echo "O participante não existe na base!";
        return;
    }
    $participante = $participanteRepository->findParticipanteByEmail($email);
    $inscricao = Inscricao::create()
        ->setDataPagamento(date("Y-m-d H:i:s"))
        ->setDataInscricao(date("Y-m-d H:i:s"))
        ->setPago(true)
        ->setValor(20.00)
        ->setIdParticipante($participante->id);

    $id = $inscricaoRepository->save($inscricao);
    if(isset($id)){
        echo json_encode( ['status'=>SUCCESS_PROCESS_STATUS] );
        return;
    }
    echo json_encode( ['status'=>ERROR_PROCESS_STATUS]);
    return;





